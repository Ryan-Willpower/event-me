<?php
// Include the main TCPDF library (search for installation path).
require_once '../vendor/autoload.php';
require 'connect_sql.php';
require 'session.php';
$user = $_SESSION['user'];
$query = "SELECT title, place, `date`
FROM `event` 
WHERE eventid=
(SELECT eventid 
FROM participants 
WHERE userid=(SELECT userid FROM account WHERE username='ryan')
AND confirmation=1
)";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ryan Willpower');
$pdf->SetTitle('Reciept');
$pdf->SetSubject('Your receipt');

// remove default header/footer
// $pdf->setPrintHeader(false);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Your Receipt', null, array(0,64,255), array(0,64,128));
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set some text to print 
$event = '';
$result = $mysql->query($query);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    ["title" => $title, "place" => $place, "date" => $date] = $row;
    $event .= "<li>title: $title</li>";
  }
}
$html = "
  <p>user: $user</p>
  <p>Event: </p>
  <ul>
    $event
  </ul>
  <p>Price: 300 bath</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('receipt.pdf', 'I');