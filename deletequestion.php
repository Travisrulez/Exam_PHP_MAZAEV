  
    <?php
include "connection.php";
  if (isset($_GET['qno'])) { //проверяем, есть ли переменная
    //удаляем строку из таблицы
    $run = mysqli_query($conn, "DELETE FROM `questions` WHERE `qno` = {$_GET['qno']}");
    if ($run) {
      echo "<p>Товар удален.</p>";
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }
  }
?>