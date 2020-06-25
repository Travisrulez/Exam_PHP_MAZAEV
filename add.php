<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {

if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);


    $checkqsn = "SELECT * FROM questions";
	$runcheck = mysqli_query($conn , $checkqsn) or die(mysqli_error($conn));
	$qno = mysqli_num_rows($runcheck) + 1;

	$query = "INSERT INTO questions(qno, question , ans1, ans2, ans3, ans4, correct_answer) VALUES ('$qno' , '$question' , '$choice1' , '$choice2' , '$choice3' , '$choice4' , '$correct_answer') " ;
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully added'); </script> " ;
	}
	else {
		"<script>alert('error, try again!'); </script> " ;
	}
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Опросник PHP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>Опросник PHP</h1>
				<div class="buttons">
					<a href="index.php" class="start">Главная</a>
					<a href="add.php" class="start">Новый опрос</a>
					<a href="allquestions.php" class="start">Все вопросы</a>
					<a href="players.php" class="start">Участники</a>
					<a href="exit.php" class="start">Выйти</a>
				</div>
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Добавить вопрос</h2>
				<form method="post" action="">

					<p>
						<label>Вопрос</label>
						<input type="text" name="question" required="">
					</p>
					<p>
						<label>Вариант #1</label>
						<input type="text" name="choice1" required="">
					</p>
					<p>
						<label>Вариант #2</label>
						<input type="text" name="choice2" required="">
					</p>
					<p>
						<label>Вариант #3</label>
						<input type="text" name="choice3" required="">
					</p>
					<p>
						<label>Вариант #4</label>
						<input type="text" name="choice4" required="">
					</p>
					<p>
						<label>Правильный ответ</label>
						<select name="answer">
                        <option value="a">Вариант #1 </option>
                        <option value="b">Вариант #2</option>
                        <option value="c">Вариант #3</option>
                        <option value="d">Вариант #4</option>
                    </select>
					</p>
					<p>
						<input type="submit" name="submit" value="Добавить">
					</p>
					<small><b>Внимание!</b> Вопросы можно писать только на английском языке, из-за особенности программы</small>	
				</form>
			</div>
		</main>

		

	</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>