<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
	?>



<?php 
if (isset($_GET['qno'])) {
	$qno = mysqli_real_escape_string($conn , $_GET['qno']);
	if (is_numeric($qno)) {
		$query = "SELECT * FROM questions WHERE qno = '$qno' ";
		$run = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if (mysqli_num_rows($run) > 0) {
			while ($row = mysqli_fetch_array($run)) {
				 $qno = $row['qno'];
                 $question = $row['question'];
                 $ans1 = $row['ans1'];
                 $ans2 = $row['ans2'];
                 $ans3 = $row['ans3'];
                 $ans4 = $row['ans4'];
                 $correct_answer = $row['correct_answer'];
			}
		}
		else {
			echo "<script> alert('error');
			window.location.href = 'allquestions.php'; </script>" ;
		}
	}
	else {
		header("location: allquestions.php");
	}
}

?>
<?php 
if(isset($_POST['submit'])) {
	$question =htmlentities(mysqli_real_escape_string($conn , $_POST['question']));
	$choice1 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice1']));
	$choice2 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice2']));
	$choice3 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice3']));
	$choice4 = htmlentities(mysqli_real_escape_string($conn , $_POST['choice4']));
	$correct_answer = mysqli_real_escape_string($conn , $_POST['answer']);
    

	$query = "UPDATE questions SET question = '$question' , ans1 = '$choice1' , ans2= '$choice2' , ans3 = '$choice3' , ans4 = '$choice4' , correct_answer = '$correct_answer' WHERE qno = '$qno' ";
	$run = mysqli_query($conn , $query) or die(mysqli_error($conn));
	if (mysqli_affected_rows($conn) > 0 ) {
		echo "<script>alert('Question successfully updated');
		window.location.href= 'allquestions.php'; </script> " ;
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
					<a href="add_quiz.php" class="start">Новая сессия</a>
					<a href="allquiz.php" class="start">Все сесии</a>
					<a href="players.php" class="start">Участники</a>
					<a href="exit.php" class="start">Выйти</a>
				</div>
			</div>
		</header>

		<main>
			<div class="container">
				<h2>Редактировать вопрос</h2>
				<form method="post" action="">

					<p>
						<label>Вопрос</label>
						<input type="text" name="question" required="" value="<?php echo $question; ?>">
					</p>
					<p>
						<label>Вопрос #1</label>
						<input type="text" name="choice1" required="" value="<?php echo $ans1; ?>">
					</p>
					<p>
						<label>Вопрос #2</label>
						<input type="text" name="choice2" required="" value="<?php echo $ans2; ?>">
					</p>
					<p>
						<label>Вопрос #3</label>
						<input type="text" name="choice3" required="" value="<?php echo $ans3; ?>">
					</p>
					<p>
						<label>Вопрос #4</label>
						<input type="text" name="choice4" required="" value="<?php echo $ans4; ?>">
					</p>
					<p>
						<label>Правильный ответ</label>
						<select name="answer" >
                        <option value="a">Вопрос #1 </option>
                        <option value="b">Вопрос #2</option>
                        <option value="c">Вопрос #3</option>
                        <option value="d">Вопрос #4</option>
                    </select>
					</p>
					<p>
						
						<input type="submit" name="submit" value="Изменить">
					</p>
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