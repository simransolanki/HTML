<?php
session_start();
if(isset($_SESSION["admin"])) {
  if($_SESSION["admin"] == "invalid"){
    echo '<script>  window.location="index.php"; </script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ScoopNSmile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <?php include "navigation.php"?>
  <br>
  <br>
  <br>
  <br>
  <h1>Welcome Admin</h1>
  <div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Total Customers</th>
        <th>Total Products</th>
        <th>Total Orders</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <?php
            require_once('connection.php');
            $sql = "SELECT * FROM customers";
            $result = @$con->query($sql);
            if(mysqli_num_rows($result)){
              echo @mysqli_num_rows($result);}
              else{echo 0;}
            // mysqli_close($con);
          ?>
        </td>
        <td>
          <?php
          // require_once('connection.php');
          $sql = "SELECT * FROM products";
          $result = @$con->query($sql);
          if(@mysqli_num_rows($result)){
            echo @mysqli_num_rows($result);}
            else{echo 0;}
        //   @mysqli_close($con);
          ?>
        </td>
        <td>
          <?php
          // require_once('connection.php');
          $sql = "SELECT * FROM orders1";
          $result = @$con->query($sql);
          if(@mysqli_num_rows($result)){
            echo @mysqli_num_rows($result);}
            else{echo 0;}
          @mysqli_close($con);
          ?>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>
