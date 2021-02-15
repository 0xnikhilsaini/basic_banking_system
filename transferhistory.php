<?php 
session_start();
//creat connection to database
include 'conn.php';
?>


<?php 

  $uid=(int)$_SESSION['senderid'];


$sql = "SELECT * FROM Transfers where userid=$uid ";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Basic Banking System</title>
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
  <h3>Transfer History </h3>
  
 <?php
  
if ($result->num_rows > 0) {
  // output data of each row or record
  while($row = $result->fetch_assoc()) {
    
    $mtype=$row["Transfertype"];
    $mtypea = ($mtype=="Sent")?"Sent To ":"Received From ";
    $name=$row["Seconduserfname"]." ".$row["Seconduserlname"];
    $amount=$row["Amount"];
    $amounta = ($mtype=="Sent")?"  -₹ ".$amount:"  +₹ ".$amount;
    $date=$row["Transferdate"];
   
   echo "<div>
   <span  width='50%'>
     <span>Money ".$mtypea.": <br>" .$name."</span>
     </span>
     <span width='50%'  style='float: right;'>". $amounta." </span> <br>
    ".$date."</div><br>";
  }
  }else {
  echo "0 results";
}
$conn->close();
 ?>
  
  </div>

</body>

</html>
