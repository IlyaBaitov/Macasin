<?php
// Хз зачем это но с этим оно работает
  $usr = "";

// Delete COOKIE
  setcookie("user", $usr, time() - time(), "/");

// " header("Location ../index.php"); " don't work
  echo "<a href='../index.php'>Вернуться</a>";
?>
