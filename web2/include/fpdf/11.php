<?php
require "fpdf.php";
// $db = new PDO('mysql:host=localhost;dbname=web2_project','root','');
class myPDF extends FPDF{
	function header(){
		$this->Image('logo.png',10,6);
		$this->Image('iso.png',250,2);
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
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page ' .$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(40,10,'UID',1,0,'C');
		$this->Cell(40,10,'NAME',1,0,'C');
		$this->Cell(40,10,'DATE',1,0,'C');
		$this->Cell(40,10,'TIME',1,0,'C');
		$this->Cell(38,10,'LOCATION',1,0,'C');
		$this->Cell(38,10,'PRICE',1,0,'C');
		$this->Cell(38,10,'STATUS',1,0,'C');
		$this->Ln(10);
	}
	function viewTable($db){
		$aid = 1111;
		$this->SetFont('Times','',12);
		$stmt = $db->query("select * from register where r_aid = '$aid'");
		while($data = $stmt->fetch(PDO::FETCH_OBJ)){
			$this->Cell(40,10,$data->r_aid,1,0,'C');
			$this->Cell(40,10,$data->r_name,1,0,'C');
			$this->Cell(40,10,$data->r_date,1,0,'C');
			$this->Cell(40,10,$data->r_time,1,0,'C');
			$this->Cell(38,10,$data->r_location,1,0,'C');
			$this->Cell(38,10,$data->r_price,1,0,'C');
			$this->Cell(38,10,'Confirm',1,0,'C');
			$this->Ln();
		}
	}
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
// $pdf->viewTable($db);
$pdf->Output();	
?>