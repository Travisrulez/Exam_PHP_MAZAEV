<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
include "connection.php";
if (isset($_POST['submit'])) {
$sql = "INSERT INTO quiz(title) VALUE ('".$_POST['title']."')";
$res = mysqli_query($conn , $sql) or die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
    <title>Document</title>
</head>
<body>
<header>
			<div class="container">
				<h1>Опросник PHP</h1>
				<div class="buttons">
					<a href="index.php" class="start">Главная</a>
					<a href="add_quiz.php" class="start">Новая сессия</a>
					<a href="allquiz.php" class="start">Все сесии</a>
					<a href="players.php" class="start">Участники</a>
					<a href="exit.php" class="start">Выйти</a>
				</div>
			</div>
		</header>
<form action='' method='post' enctype="multipart/form-data">
<p>
<label>Новый опрос</label>
<input type="text" name="title" required="">
</p>
<div class="form-actions">
                <input type="submit" name="submit" class="btn btn-success" value="Сохранить">
                <a href="dashboard.php" class="btn btn-inverse">Отменить</a>
            </div>
</form>
</body>
</html>