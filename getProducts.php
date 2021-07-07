<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
  require_once('connection.php');
  $returnArray = array();
  if($_GET['category'] == 'all'){$sql = "SELECT * FROM products ORDER BY id DESC";}
  if($_GET['category'] == 'roll'){$sql = "SELECT * FROM products WHERE category='roll' ORDER BY id DESC";}
  if($_GET['category'] == 'kulfi'){$sql = "SELECT * FROM products WHERE category='kulfi' ORDER BY id DESC";}
  if($_GET['category'] == 'cup'){$sql = "SELECT * FROM products WHERE category='cup' ORDER BY id DESC";}
  if($_GET['category'] == 'family'){$sql = "SELECT * FROM products WHERE category='family' ORDER BY id DESC";}
  $result = $con->query($sql);
  echo json_encode($result->fetch_all());
  mysqli_close($con);
}
