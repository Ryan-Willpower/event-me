<?php
require_once 'fpdf.php';
require '../connect_sql.php';
require '../session.php';
$user = $_SESSION['user'];
$query = "SELECT title, place, `date`
FROM `event` 
WHERE eventid=
(SELECT eventid 
FROM participants 
WHERE userid=(SELECT userid FROM account WHERE username='ryan')
AND confirmation=1
)";

$event = '';
$result = $mysql->query($query);


class myPDF extends fpdf{
	function header(){
		$this->Image('logo.png',80,3);
		$this->SetFont('Arial','B',22);
		$this->Ln(40);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page ' .$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable($user){
		$this->SetX(116);
		$this->Cell(40,10,"username: $user");
		$this->Ln(20);
		$this->SetX(85);
		$this->SetFont('Times','B',12);
		$this->Cell(40,10,'NAME',1,0,'C');
		$this->Cell(40,10,'LOCATION',1,0,'C');
		$this->Cell(40,10,'DATE',1,0,'C');
		$this->Ln(10);
	}
	function viewTable($db){
		$this->SetFont('Times','',12);
		$this->SetX(85);
		if ($db->num_rows > 0) {
			while($data = $db->fetch_assoc()){
				$this->Cell(40,10,$data['title'],1,0,'C');
				$this->Cell(40,10,$data['place'],1,0,'C');
				$this->Cell(40,10,$data['date'],1,0,'C');
				$this->Ln();
			}
		}
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable($user);
$pdf->viewTable($result);
$pdf->Output();	
?>