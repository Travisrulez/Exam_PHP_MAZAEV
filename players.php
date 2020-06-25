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
					<a href="add.php" class="start">Новый опрос</a>
					<a href="allquestions.php" class="start">Все вопросы</a>
					<a href="players.php" class="start">Участники</a>
					<a href="exit.php" class="start">Выйти</a>
				</div>
			</div>
		</header>

		
	<h1>Все участники</h1>
	<table class="data-table">
		<thead>
			<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Дата входа</th>
			<th>Очки</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>

