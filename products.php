<?php
session_start();
if($_SESSION["admin"] == "invalid"){
  echo '<script>  window.location="index.php"; </script>';
}
if(isset($_GET['call'])){
 if($_GET['call'] == 'delete'){
   $id = $_GET['id'];
   require_once('connection.php');
   $sql = "delete from products where id=".$id."";
   mysqli_query($con,$sql);
   echo '<script> alert("Success : Product deleted successfully!");  window.location="products.php"; </script>';
 }
 if($_GET['call'] == 'add'){
   $title = $_POST['title'];
   $price = $_POST['price'];
   $category = $_POST['category'];
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=@strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$category."/".$file_name);
         require_once('connection.php');
         $sql = "INSERT INTO products(title,price,category,image)
                  VALUES('".$title."','".$price."','".$category."','".$file_name."')";
         mysqli_query($con,$sql);
         echo '<script>  alert("Succes : Product added successfully !"); window.location="products.php"; </script>';
      }else{
         print_r($errors);
      }
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
  <center><h4>ScoopsNSmile - Products Section</h4></center>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?call=add" enctype="multipart/form-data">
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required>
        </div>
        <div class="form-group">
          <label for="price">Price:</label>
          <input type="price" class="form-control" id="price" placeholder="Enter price" name="price" required>
        </div>
        <div class="form-group">
          <label for="category">Category:</label>
          <select class="form-control" id="category" name="category" required>
            <option></option>
            <option>family</option>
            <option>cup</option>
            <option>roll</option>
            <option>kulfi</option>
          </select>
        </div>
        <div class="form-group">
          <label for="file">File:</label>
          <input type="file" class="form-control" id="image" placeholder="Enter file" name="image" required>
        </div>
        <button type="submit" class="btn btn-default">Add</button>
      </form>
    </div>
    <div class="col-sm-8">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>title</th>
              <th>price</th>
              <th>Category</th>
              <th>image</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
              <?php
              require_once('connection.php');
                $sql = "SELECT * FROM products order by id DESC";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"]. "</td>";
                        echo "<td>" . $row["title"]. "</td>";
                        echo "<td>" . $row["price"]. "</td>";
                        echo "<td>" . $row["category"]. "</td>";
                        echo "<td><img src='images/".$row["category"]."/" . $row["image"]. "'' width='50' height='50'></td>";
                        echo "<td><a href='".$_SERVER['PHP_SELF']."?call=delete&&id=".$row["id"]."'>Delete</a></td>";
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
