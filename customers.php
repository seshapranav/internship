<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Banking system</title>
</head>
<body>
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
  
<?php
    if(isset($_SESSION['deladd'])){echo"<div style='color:green;font-size:20px;'>".$_SESSION['deladd']."</div>";unset($_SESSION['deladd']);}
    ?>
    <?php
      $stmt = $pdo->query("SELECT * FROM customers");
      print'<table class="table table-bordered table-striped table-hover"><tr class="thead-dark"><th>Customer Name</th><th>Email</th><th>Current Balance</th><th></th></tr>';
      while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
          print "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row['balance']."<td>
          <a style='color:green' href='currentcustomer.php?currentsl=".$row["sl"]."'>Select</a></td></tr>";
      }
  ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>