<?php
 if($_SERVER['REQUEST_METHOD']=='GET'){
     $username = $_GET['username'];
     $password = $_GET['password'];
     require_once('connection.php');
     $sql = "select * from customers where username='".$username."' and password='".$password."'";
     $check = mysqli_fetch_array(mysqli_query($con,$sql));
     if(isset($check)){
        echo "success";
     }else{
        echo "Invalid Username or Password";
     }
 }else{
    echo "error try again";
 }
