<?php
session_start();
require "include/fpdf/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=web2_project','root','');
class myPDF extends FPDF{
	function header(){
		$this->Image('include/img/logo.png',10,6);
		$this->Image('include/img/iso.png',250,2);
		$this->SetFont('Arial','B',22);
		$this->Cell(276,5,'IIG Network Co.Ltd.',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'135/27, Chueam Samphan Rd, Khwaeng Krathum Rai,',0,0,'C');
		$this->Ln(5);
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Nong Chok, Bangkok, Thailand, 10530',0,0,'C');
		$this->Ln(5);
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Tel : +6621078610 | Email : sale@iig.in.th',0,0,'C');
		$this->Ln(20);
	}
  function userdate(){
    include "include/con_db.php";
    $sql = "SELECT * FROM account where email = '".$_SESSION['login_email']."'";
  	$result = $conn->query($sql);
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        $row2 = $row;
      }
    }

    $this->SetFont('Times','',14);
		$this->Cell(100,8,'Billed to',0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
		$this->Cell(100,5,$row2['fname']." ".$row2['lname'],0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
		$this->Cell(100,5,"idcard : ".$row2['idnumber'],0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(100,5,"email : ".$row2['email'],0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
		$this->Cell(100,5,"tel : ".$row2['tel'],0,0,'C');
    $this->Ln(10);
  }
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page ' .$this->PageNo().'/{nb}',0,0,'C');
	}
  function uline(){
    $this->SetFont('Times','B',12);
		$this->Cell(274,2,'',1,10,'C');
		$this->Ln(5);
	}
	function headerTable(){
		$this->SetFont('Times','B',15);
		$this->Cell(55,10,'NAME',0,0,'C');
		$this->Cell(55,10,'DATE',0,0,'C');
		$this->Cell(55,10,'TIME',0,0,'C');
		$this->Cell(55,10,'LOCATION',0,0,'C');
		$this->Cell(55,10,'PRICE',0,0,'C');
		$this->Ln(20);
	}
	function viewTable($db){
		$aid = $_GET['id'];
    $email = $_SESSION['login_email'];
		$this->SetFont('Times','',14);
		$stmt = $db->query("select * from register where r_id = '$aid'");
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
      if ($data->r_status != '2') {
        echo "<script language='javascript'>alert('Bill Not Success !!!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=history.php' />";
        exit;
      }
			$this->Cell(55,10,$data->r_name,0,0,'C');
			$this->Cell(55,10,$data->r_date,0,0,'C');
			$this->Cell(55,10,$data->r_time,0,0,'C');
			$this->Cell(55,10,$data->r_location,0,0,'C');
			$this->Cell(55,10,$data->r_price,0,0,'C');
			$this->Ln();
		}
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->userdate();
$pdf->uline();
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>
