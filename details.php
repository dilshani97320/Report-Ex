<?php

require('fpdf182/fpdf.php');
include_once('index.php');



$db = new PDO('mysql:host=localhost;dbname=bayfront_hotel','root','');


//require('fpdf182/font/helvetica8.php');
//A4 width :219 mm
//default margin : 10mm each side
//writable horizontal :219. (10*2)=189mm
/**
 * 
 */
class mypdf extends FPDF
{
	
	function header()
	{
		$this->Image('logo.png',5,5,-300);
		
		$this->setfont('arial', 'B', 20);
		$this->cell(276,5,'Bay Front',0,0,'C');
		$this->Ln();
		$this->setfont('Times', '', 14);
		$this->cell(276,10,'Waligama,Srilanka',0,0,'C');
		$this->Ln();
		$this->cell(276,10,'bayfront@gmail.com',0,0,'R');
		$this->Ln();
		$this->cell(276,10,'+47 7723456',0,0,'R');
		$this->Ln();
		$this->cell(276,10,'2020-12-4',0,0,'R');
		$this->Ln();
		$this->Ln(30);
		$this->setfont('arial', 'B', 20);
		$this->cell(276,10,'BAYFRONT-DETAILS',0,0,'L');
		$this->Ln(20);


	}
	function footer()
	{
		$this-> setY(-15);
		$this->setfont('arial', '', 8);
		$this->cell(0,10,'page' .$this->PageNo().'/{nb}',0,0,'c');
	}


   function headerTable(){
         $this->setfont('Times', 'B', 14);
         $this->cell(40,10,'First Name',1,0,'C');
         $this->cell(40,10,'Last Name',1,0,'C');
         $this->cell(40,10,'contact No',1,0,'C');
         $this->cell(20,10,'Age',1,0,'C');
         $this->cell(70,10,'E mail',1,0,'C');
         $this->cell(40,10,'location',1,0,'C');
         $this->cell(40,10,'No of guests',1,0,'C');
         $this->cell(40,10,'Payment method',1,0,'C');
         
        $this->cell(50,10,'Check in date',1,0,'C');
         $this->cell(50,10,'Check out date',1,0,'C');
         
         $this->Ln();

	}

	function viewTable($db)
	{

     


       $this->setfont('Times','',12);
       $stmt=$db->query('SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
FROM reservation 
INNER JOIN customer on
reservation.customer_id=customer.customer_id
WHERE check_in_date BETWEEN '$txtStartDate' and '$txtEndDate' order BY check_in_date;');

       while ($data =$stmt->fetch(PDO :: FETCH_OBJ)) {

       	   $this->setfont('Times', '', 14);
       	   $this->cell(40,10,$data->first_name,1,0,'C');
         $this->cell(40,10,$data->last_name,1,0,'C');
         $this->cell(40,10,$data->contact_number,1,0,'C');
         $this->cell(20,10,$data->age,1,0,'C');
         $this->cell(70,10,$data->email,1,0,'C');
         $this->cell(40,10,$data->location,1,0,'C');
         $this->cell(40,10,$data->no_of_guest,1,0,'C');
         $this->cell(40,10,$data->payment_method,1,0,'C');
         $this->cell(50,10,$data->check_in_date,1,0,'C');
         $this->cell(50,10,$data->check_out_date,1,0,'C');
         
         //$this->cell(50,10,'Salary',1,0,'C');
         $this->Ln();
       }
	
	}
	
	
}


$pdf = new mypdf();


$pdf->AddPage('L','A3',0);

$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Ln();

/*

//$pdf->AliasNoPages();
$pdf->setfont('arial', '', 12);
$pdf->Ln(30);
$pdf->cell(55,5,'Refference code',0,0);
$pdf->cell(58,5,'867v5',0,0);
$pdf->cell(58,5,'Date',0,0);
$pdf->cell(58,5,'2020-40 23:22.00',0,0);
$pdf->Ln();
$pdf->cell(55,5,'Amount',0,0);
$pdf->cell(58,5,':342',0,0);
$pdf->Ln();
$pdf->cell(58,5,'channel',0,0);
$pdf->cell(58,5,':EWS',0,0);

$pdf->Ln();
$pdf->Line(5,6,7,8);
$pdf->cell(55,5,'Annual Income',0,0);
$pdf->cell(58,5,':EWS',0,0);

//$pdf->Line(10,30,200,30);
$pdf->Ln(10);
$pdf->cell(55,5,'channel',0,0);
$pdf->cell(58,5,':EWS',0,0);
$pdf->output();

//set font to arial,bold,14pt
/*SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
FROM reservation 
INNER JOIN customer on
reservation.customer_id=customer.customer_id
WHERE check_in_date BETWEEN '2020-03-01' and '2020-11-10' order BY check_in_date;*/


?>
