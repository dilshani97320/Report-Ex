<?php  

  include_once('connection.php');


if(isset($_post['generate']))
{
  //$txtStartDate=$_post['start_date'];
  $txtStartDate='05/03/2020';
  $txtEndDate='05/11/2020';
  //$txtEndDate=$_post['end_date'];
echo $txtStartDate;


  $query=mysqli_query($connection,"SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
FROM reservation 
INNER JOIN customer on
reservation.customer_id=customer.customer_id
WHERE check_in_date BETWEEN '$txtStartDate' and '$txtEndDate' order BY check_in_date");
  $count=mysqli_num_rows($query);
 
}



/*$start_date_error ='';
$end_date_error ='';

$query="SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date
FROM reservation 
INNER JOIN customer on
reservation.customer_id=customer.customer_id
WHERE check_in_date BETWEEN '$txtStartDate' and '$txtEndDate' order BY check_in_date";


$statement=$connection->prepare($query);
$statement->execute();
$result=$statement->fetchAll();*/



?>






<!DOCTYPE html>
<html>
<head>
	<title>Reports in php</title>
	<link rel="stylesheet" type="text/css" href="newcss.css">
</head>
<body>



<div class="container">
	
<div class="wrapper">
	<h1>Report Generator</h1>

	

	<div class="data">
		


<h3>Enter the duration to get Report</h2>
 	<form action="newone.php" method="post">


        <input type="date" name="start_date">
        <input type="date" name="end_date">
        <!--<input type="submit" name="generate" class="submit" value="Generate the report">-->
        <button type="submit" class="submit" name="generate">Genrate</button>


   </form>

	</div>

	<table border="1" class="table">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact Number</th>
			<th>Age</th>
			<th>email</th>
			<th>Location</th>
			<th>No of Guests</th>
			<th>Payment method</th>
			<th>check in date</th>
			<th>check out date</th>
		</tr> 

             <tbody>
                <?php 
                 
                 if($count==0)
                 {
                  echo "<h2>No data found</h2>";
                 }
                 else{

                while($row=mysqli_fetch_array($query)){?>
                <tr>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['contact_number'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['location'] ?></td>
                    <td><?php echo $row['no_of_guest'] ?></td>
                    <td><?php echo $row['payment_method'] ?></td>
                    <td><?php echo $row['check_in_date'] ?></td>
                    <td><?php echo $row['check_out_date'] ?></td>
                    
                </tr>
                <?php } 

                          


                   }
                ?>

            </tbody>

	</table>
	


</div>

</div>


</body>
</html>