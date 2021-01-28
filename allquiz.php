<?php session_start(); ?>
<?php include "connection.php";
if (isset($_SESSION['admin'])) {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Опросник PHP</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
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

		
	<h1>Все вопросы</h1>
	<table class="data-table">
		<thead>
			<tr>
            <th>Номер</th>
				<th>Опрос</th>
                <th>Добавить вопрос</th>
                <th>Все вопросы вопрос</th>
				<th>Удалить</th>
				<th>Ссылка</th>
			</tr>
		</thead>
		<tbody>
        
		<?php 
            $query = "SELECT * FROM quiz ORDER BY id DESC";
            $select_questions = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_questions) > 0 ) {
            while ($row = mysqli_fetch_array($select_questions)) {
                $qno = $row['id'];
                $question = $row['title'];
                echo "<tr>";
                echo "<td>$qno</td>";
                echo "<td>$question</td>";
                echo "<td><a href='add.php?id=$qno'> Добавить </a></td>";
                echo "<td><a href='allquestions.php?id=$qno'> Все вопросы </a></td>";
				echo "<td><a href='deletequiz.php?id=$qno'> Delete </a></td>";
					?><td><div><input type="text" value="http://localhost/PHP_KUIZ-master/Mazaev_exam_php/home.php?id=<?=$qno?>" id="myInput"></div>
					<button onclick="myFunction()">Сненерировать ссылку</button></td>
		 <?php 
		 echo "</tr>";
		}
	}
		 ?>
		</tbody>
	</table>
	<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
}
</script>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>