<?php
session_start();
$_SESSION['totalcost']=0;
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=bank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->query("SELECT * FROM customers WHERE sl=".$_GET['receiversl']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$receiveramount=$row['balance']+$_SESSION['amount'];
$stmt=$pdo->query("update customers set balance=$receiveramount where sl=".$_GET['receiversl']);



$stmt = $pdo->query("SELECT * FROM customers WHERE sl=".$_SESSION['currentsl']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$senderamount=$row['balance']-$_SESSION['amount'];
$stmt=$pdo->query("update customers set balance=$senderamount where sl=".$_SESSION['currentsl']);
$_SESSION['deladd']="Money Transferred Succesfully.";
header("Location:customers.php");
?>