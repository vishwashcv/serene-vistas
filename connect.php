<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$number = isset($_POST['number']) ? $_POST['number'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';


	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, email, number, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $name, $email, $number, $message);
		$stmt->execute();
		echo "<h1><center>Submitted successfully</center></h1>";
		$stmt->close();
		$conn->close();
	}

?>