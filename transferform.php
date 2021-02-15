<?php
session_start();
$reid=$_GET['id'];
$_SESSION['refname']=$_GET['fnam'];
$_SESSION['relname']=$_GET['lnam'];
$_SESSION['receiverid']=$reid;
?>


<?
/*php 
session_start();
if(!(isset($_SESSION['username'])))
header("Location:login.php");
*/
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
<body class="bg-dark ">
 
<div class="container  p-3  bg-dark text-white">
  

  
     

  <label for="usr">Enter Amount:</label>
  <input required type="number"  class="form-control" id="usr" placeholder="₹">

    <br>
     
     <button  onclick="myFunction()" type="button" class="btn btn-secondary">Transfer</button>

     
  </div>
  
<p id="balid" style="display: none;">
<?php echo $_SESSION['sbal']; ?>  
</p>

<script>
  
 

function myFunction() {
    
     var sbal = parseInt( document.getElementById('balid'). innerHTML);
 
  var node = document.querySelector('#usr');
    
    
    
     var ebal = parseInt(node.value);
   
    if((ebal>0 )&&(ebal<=sbal)){
      var  url = "https://transfermony.000webhostapp.com/transferlogic.php?amo=" + ebal;
     open(url);
    } else if(ebal==0){alert("invalid input")}
    
    else { alert("You have not enough balance.\nTranfer is not possible"); }
     
 }
     
    
    
    
    
    
    
</script>




  
  
</body>
</html>