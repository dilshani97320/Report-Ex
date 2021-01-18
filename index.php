<?php 
include_once('connection.php');



$start_date_error='';
$end_date_error=''; 

if(isset($_POST['Generate']))
{

   $txtStartDate=$_POST('start_date');
   $txtEndDate=$_POST('end_date');
   $query=mysqli_query($connection,"SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
FROM reservation 
INNER JOIN customer on
reservation.customer_id=customer.customer_id
WHERE check_in_date BETWEEN '$txtStartDate' and '$txtEndDate' order BY check_in_date");
   $count=mysqli_num_rows($query);


	}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Report Generator</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>
 	<div class="wrapper">
 <section class="header">
 	<h1>WELCOME BAY FRONT</h1>

 	
 </section>
 <section class="repo-btn">
 	<a href="employee.php">Employees</a>
 	<a href="rooms-report.php">Rooms</a>
    <a href="customer.php">Customers</a>
    <a href="reservation.php">Reservation</a>
    <a href="payment.php">Payment</a>  
    <a href="#">Surf-Packages</a>

 </section>



 <section class="repo-main">

<h3>Enter the duration to get Report</h2>
 	<form method="post" action="details.php">


        <input type="date" name="start_date">
        <input type="date" name="end_date">
       <!-- <input type="submit" name="Generate" value="Generate the report">-->
        <a href="details.php">Generate the report</a>


<!--<?php
  if($count== "0")
  {
  	echo "<h2>No data found</h2>";
  }
  else
  {
  	while ($row=mysqli_fetch_array($query)) {
  		$result=$row['first_name'];
  		$outpt='<h1>'.$result.'</h1>';
  		echo $outpt;
  	}
  }


?>-->



<!--
 		<select name='check_in_date'>
 			<?php
             $query=mysqli_query($connection,"select * from reservation");
             while ($date =mysqli_fetch_array($query)) {
             	echo "<option value='".$date['check_in_date']."'>".$date['check_in_date']."</option>";
             }
 			?>
 		</select>
<input type="submit" name="submit1" class="sub-btn" value="Generate">

 	<!--<h3>Enter Time Duration to get Report</h2>
 	<form method="get">
 		<label>Start date</label>
 		<input type="date" name="start_date" >
 		<?php echo $start_date_error; ?>
 		<label>End date</label>
 	<input type="date" name="end_date" >
 	<?php echo $end_date_error; ?>

 	<input type="submit" name="submit" class="sub-btn">-->-->


 	</form>
 	
 </section>
 </div>
 </body>
 </html>
