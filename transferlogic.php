<?php
session_start();
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
  <h1>Basic Banking System </h1>
  
 <p>Money transfer succesfully!</p>
<br>
    <a href='https://transfermony.000webhostapp.com/index1.php' role='button'
    aria-pressed='true' class='btn btn-secondary btn-lg btn-block'>OK</a>
  
  
  </div>
  <!-- php code-->
  
    
<p style="display: none;">
<?php

$amount = $_GET['amo'];

$refname = $_SESSION['refname'];

$relname =
$_SESSION['relname'];

$rid =   $_SESSION['receiverid'];



$sefname = $_SESSION['sefname'];

$selname = 
$_SESSION['selname'];

$sid =   $_SESSION['senderid'];


?>

<?php
// update amount of sender and receive history data creat

/*
$recbal;
$senbal;
$amount = $POST['amount'];
$senter = $Session['sender'];
$recever = $Session['receiver'];

if($amount<=$senbal){
    $senbal -=$amount;
    $recbal +=$amount;
    echo"alert('succesful money transfer')";
} 
*/

?>

<?php
//creat connection to database
include 'conn.php';
?>


<?php 
// update receiver balance
// update sender balance
$sql = "SELECT CurrentBal FROM Customers where Customerid=$rid";
$result = $conn->query($sql);
?>

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    

$rbal=$row["CurrentBal"];       
 
  }
} else {
  echo "0 results";
}
?>

<?php 
$sql = "SELECT CurrentBal FROM Customers where Customerid=$sid";
$result = $conn->query($sql);
?>


<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    

$sbal=$row["CurrentBal"];       
 
  }
} else {
  echo "0 results";
}
// csb current sender balance
// crb current receiver //balace
//convert string to interger
$csb = $sbal-$amount;
$crb = $rbal+$amount;
//query to update sender and receiver balace



$sql = "UPDATE Customers SET CurrentBal='$csb' WHERE Customerid=$sid";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}




$sql = "UPDATE Customers SET CurrentBal='$crb' WHERE Customerid=$rid";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
?>

<?php
//insert history record
$sql = "INSERT INTO Transfers (
Seconduserlname,Seconduserfname,
Amount,userid,
Transfertype)
VALUES('$relname', '$refname' , $amount,$sid,'Sent'),
('$selname', '$sefname' , $amount,$rid,'Received')";




if ($conn->query($sql) === TRUE) {
  echo "Book record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}










?>
<?php
$conn->close();

// for redirect header//("Location:home.php");
?>



<?php
session_destroy();
?>


</p>



  
  
  
  
  
  
  
  
  
  
  

</body>
</html>