<?php
session_start();
if($_SESSION["admin"] == "invalid"){
  echo '<script>  window.location="index.php"; </script>';
}
if(isset($_GET['call'])){
 if($_GET['call'] == 'delete'){
   $username = $_GET['username'];
   require_once('connection.php');
   $sql = "delete from customers where username='".$username."'";
   mysqli_query($con,$sql);
   echo '<script> alert("Success : User deleted successfully!"); window.location="customers.php"; </script>';
 }
 if($_GET['call'] == 'add'){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $name = $_POST['name'];
   $mobile = $_POST['mobile'];
   $address = $_POST['address'];
   require_once('connection.php');
   $sql = "select * from customers where username='".$username."' and password='".$password."'";
   $check = mysqli_fetch_array(mysqli_query($con,$sql));
   if(isset($check)){
      echo '<script>  alert("Error : Username already exists!")</script>';
   }else{
     $sql = "INSERT INTO customers(username,password,name,mobile,address) VALUES('".$username."','".$password."','".$name."','".$mobile."','".$address."')";
     mysqli_query($con,$sql);
     echo '<script>  alert("Succes : User added successfully !");window.location="customers.php"; </script>';
   }
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
  <center><h4>ScoopsNSmile - Customers Section</h4></center>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?call=add">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="number" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
        </div>
        <button type="submit" class="btn btn-default">Add</button>
      </form>
    </div>
    <div class="col-sm-8">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>username</th>
              <th>password</th>
              <th>name</th>
              <th>mobile</th>
              <th>address</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              require_once('connection.php');
                $sql = "SELECT * FROM customers";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["username"]. "</td>";
                        echo "<td>" . $row["password"]. "</td>";
                        echo "<td>" . $row["name"]. "</td>";
                        echo "<td>" . $row["mobile"]. "</td>";
                        echo "<td>" . $row["address"]. "</td>";
                        echo "<td><a href='".$_SERVER['PHP_SELF']."?call=delete&&username=".$row["username"]."'>Delete</a></td>";
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
