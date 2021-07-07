<?php



if($_SERVER['REQUEST_METHOD']=='GET'){
		$name = $_GET['name'];
		$username = $_GET['username'];
		$password = $_GET['password'];
		$mobile = $_GET['mobile'];
		$address = $_GET['address'];
		if($name == '' || $username == '' || $password == '' || $mobile == '' || $address == ''){
			echo 'Please complete the data first!';
		}else{
			require_once('connection.php');
			$sql = "SELECT * FROM customers WHERE username='".$username."'";
			$check = mysqli_fetch_array(mysqli_query($con,$sql));
			if(isset($check)){
				echo 'username already exists';
			}else{
				$sql = "INSERT INTO customers (name,username,password,mobile,address)
								VALUES('".$name."','".$username."','".$password."','".$mobile."','".$address."')";
				if(mysqli_query($con,$sql)){
					echo 'success';
				}else{
					echo 'Oops! Please try again!';
				}
			}
			mysqli_close($con);
		}
}else{
		echo "error try again";
}
