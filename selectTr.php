<?php 

session_start();

//creat connection to database
include 'conn.php';
?>


<?php 
$sql = "SELECT Customerid,FirstName,LastName FROM Customers";
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
<div class="container  p-3  bg-dark text-white">
  <h1>Select for transfer</h1>
  <?php
  
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      
      if ($row["Customerid"] == $_SESSION["senderid"]) {
    continue;
  }
      
      
      
    echo
    "<a href='https://transfermony.000webhostapp.com/transferform.php?fnam=". $row["FirstName"]."&lnam=".$row["LastName"]."&id=".$row["Customerid"]."'
    aria-pressed='true' class='btn btn-secondary btn-lg btn-block'><span> <img src='user.png' class='rounded-circle' alt='U'
    height='30px' width='30px'></span>
    <span>"
            .$row["FirstName"]." ".$row["LastName"]."
        </span></a>
  
  </br>";
  }
} else {
  echo "0 results";
}

$conn->close();
  ?>
 
  
  </div>

</body>

</html>

