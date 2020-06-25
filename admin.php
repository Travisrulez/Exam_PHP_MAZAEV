<?php
session_start();
include "connection.php";
if (isset($_SESSION['admin'])) {
	header("location: adminhome.php");
}
if (isset($_POST['password']))  {
	$password = mysqli_real_escape_string($conn , $_POST['password']);
	$adminpass = '$2y$12$C15iI7CTWj1g0WdgdmwTneNeGzdTjX00aLmLFEf7kB5Q66/Tz3Qaq';
	if (password_verify($password , $adminpass)) {
		$_SESSION['admin'] = "active";
		header("Location: adminhome.php");
	}
	else {
		echo  "<script> alert('wrong password');</script>";
	}
}


?>
<html>
	<head>
		<title>Опросник PHP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
				<a href="index.php" class="start">Главная</a>

			</div>
		</header>

		<main>
		<div class="container">
				<h2>Ввести пароль</h2>
				<form method="POST" action="">
				<input type="password" name="password" required="" >
				<input type="submit" name="submit" value="Отправить"> 

			</div>


		</main>
	</body>
</html>