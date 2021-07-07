<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
		$name = $_GET['name'];
		$category = $_GET['category'];
		$icecream_flavour = $_GET['icecream_flavour'];
		$quantity = $_GET['quantity'];
		$mobile = $_GET['mobile'];
		$address = $_GET['address'];
		if($name == '' || $category == '' || $icecream_flavour == '' || $quantity == '' || $mobile == ''||$address==''){
			echo 'Please complete the data first!';
		}else{
			require_once('connection.php');
			$sql = "INSERT INTO orders1 (name,category,icecream_flavour,quantity,mobile,address)
								VALUES('".$name."','".$category."','".$icecream_flavour."',".$quantity.",'".$mobile."','".$address."')";
								
				if(mysqli_query($con,$sql)){
					echo 'success';
				}else{
					echo 'Oops! Please try again!';
				}
			}
			mysqli_close($con);
		}
else{
		echo "error try again";
}

