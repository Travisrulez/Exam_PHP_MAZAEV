<?php
include "connection.php";
  if (isset($_GET['id'])) { 
    $run = mysqli_query($conn, "DELETE FROM `quiz` WHERE `id` = {$_GET['id']}");
    if ($run) {
      header("location: allquiz.php");
    } else {
      echo '<p>Произошла ошибка: ' . mysqli_error($conn) . '</p>';
    }
  }
?>