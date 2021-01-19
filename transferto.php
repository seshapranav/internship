<?php
session_start();
$_SESSION['totalcost']=0;
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
    <link rel="stylesheet" href="al.js">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
</head>
<body style="background-color:lightyellow">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SparkBanking</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link" href="customers.php">Customers</a>
          <a class="nav-link" href="transfer.php">Transfer money</a>
            
          
        </div>
      </div>
    </div>
  </nav>
  <span style="margin-left:25px;margin-bottom:25px;">
        <?php
         if(isset($_POST["amount"]))$_SESSION["amount"]=$_POST["amount"];
         else $_SESSION["amount"]=0;
        echo'  <h2>Enter amount and select Receiver:</h2>
          <h3 style="display:inline;">Amount : </h3> 
          <form method="POST"> <input type="number" name="amount" placeholder='.$_SESSION['amount'].'><input type="submit" value="Confirm"></form>';
          
         
          if(isset($_SESSION["deladd"])){echo'<div style="color:green".$_SESSION["deladd"]."<div>';}
    ?>
        </span>
<?php

$stmt = $pdo->query("SELECT * FROM customers WHERE NOT sl=".$_SESSION['currentsl']);
      print'<table class="table table-bordered table-striped table-hover"><tr class="thead-dark"><th>Customer Name</th><th>Email</th><th>Current Balance</th><th></th></tr>';
      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          print "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row['balance']."<td>
          <a style='color:green' href='Transfer.php?receiversl=".$row["sl"]."'>Select</a></td></tr>";
      }
?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>

