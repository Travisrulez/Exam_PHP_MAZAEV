<?php 
session_start();
include "connection.php";
if (isset($_SESSION['id'])) {
$query = "SELECT * FROM quiz ORDER BY id";
$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
$quiz = mysqli_fetch_all($run, MYSQLI_ASSOC);
?>

<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Привет! Выбери тему!</h2>
				<?php foreach ($quiz as $quizs):?>
                    <a href="home.php?id=<?=$quizs['id'];?>"><h2><?=$quizs['title'];?></h2></a>
                <?php endforeach; ?>
			</div>
		</main>
	</body>
</html>
<?php }
else {
	header("location: index.php");
}
?>