<?php
session_start();
if($_SESSION["admin"] == "invalid"){
  echo '<script>  window.location="index.php"; </script>';
}
if(isset($_GET['call'])){
 if($_GET['call'] == 'delete'){
   $id = $_GET['id'];
   require_once('connection.php');
   $sql = "delete from orders1 where id=".$id."";
   mysqli_query($con,$sql);
   echo '<script> alert("Success : order closed successfully!"); window.location="orders1.php"; </script>';
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
  <center><h4>ScoopsNSmile - Customer Order details</h4></center>
  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>name</th>
              <th>category</th>
              <th>icecream_flavour</th>
              <th>quantity</th>
              <th>mobile</th>
              <th>address</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              require_once('connection.php');
                $sql = "SELECT * FROM orders1 order by id desc";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["name"]. "</td>";
                        echo "<td>" . $row["category"]. "</td>";
                        echo "<td>" . $row["icecream_flavour"]. "</td>";
                        echo "<td>" . $row["quantity"]. "</td>";
                        echo "<td>" . $row["mobile"]. "</td>";
                        echo "<td>" . $row["address"]. "</td>";
                        echo "<td><a href='".$_SERVER['PHP_SELF']."?call=delete&&id=".$row["id"]."'>Close Order</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<td colspan=7>no data</td>";
                }
                mysqli_close($con);
              ?>
          </tbody>
        </table>
        </div>
    </div>
  </div>
</div>

</body>
</html>
