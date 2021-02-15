<?php 
session_start();
$userid=$_GET['id'];
$fname=$_GET["fnam"];
$lname=$_GET["lnam"];
$_SESSION['sefname']=$fname;
$_SESSION['selname']=$lname;
 $_SESSION['senderid']=$userid;
 $name = $fname." ".$lname;
 
 ?>



<?php
//creat connection to database
include 'conn.php';
?>


<?php 
$sql = "SELECT CurrentBal,Email FROM Customers where Customerid=$userid";
$result = $conn->query($sql);
?>


<?php

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
    
    
$Emial=$row["Email"];
$currentbal=$row["CurrentBal"]; 

}

$conn->close();

$_SESSION['sbal'] = $currentbal;



?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Basic Bank Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body class="bg-dark"> 
<div class="container  p-3  text-white">
  <h1>Customer Profile </h1>
  
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
</button>


  
  <div class="text-center">
  <img align="center" src="user.png" class="rounded-circle" alt="U"
    height="100px" width="100px">
  </div>
  
  <div class="text-center">
   <h3>Name:<?php echo $name; ?></h3>
  <h3>Email:<?php echo $Emial; ?></h3>
  <h3>Current Balance: ₹<?php echo $currentbal; ?></h3>
  </div>
  
  
 
  
    <a href='https://transfermony.000webhostapp.com/selectTr.php' role='button'
    aria-pressed='true' class='btn btn-secondary btn-lg btn-block'>Transfer</a>
  
  
   
  
    <a href='https://transfermony.000webhostapp.com/transferhistory.php' role='button'
    aria-pressed='true' class='btn btn-secondary btn-lg btn-block'>Transfer History</a>
  
  

  
  </div>

</body>

</html>