<?php
session_start();
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$_SESSION['currentsl']=$_GET['currentsl'];

?>

<!DOCTYPE html>
<html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=0.8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Basic Banking system.</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="styles.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  
    </head>
    <body style="background-color:lightblue">
     
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
        
         <div class="container" style="color:#17252A;margin:0;padding:20px;">
            <h2 style="color:#17252A;text-decoration: underline;">Current User Details :</h2>
            <span>
                <?php
           
            $stmt = $pdo->query("SELECT * FROM customers WHERE sl=".$_SESSION['currentsl']); 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
           echo "<h3>Name : ".$row['name']."</h3>";
           echo "<h3>Email : ".$row['email']."</h3>";
           echo "<h3>Curent Balance : ".$row['balance']."</h3>";
            ?>
            </span>
            
        </div>
        <?php echo' <a href="Transferto.php" id="button" style="margin-left:20px">Transfer&nbsp;Money</a>'; ?>
       
          
    </body>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>