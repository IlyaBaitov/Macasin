<?php
// DB
  require("../config/db.php");

// $_POST
  $login = strip_tags(trim($_POST["login"]));
  $pass = strip_tags(trim($_POST["pass"]));

// Validation
  if($login == "" || $pass == "")
  {
    exit("Введены неправельные данные");
  }

 $pass = md5($pass);

// SQL
  $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'";
  $query = $pdo->query($sql);
  $user = $query->fetch(PDO::FETCH_ASSOC);

// Validation 2
  if(empty($user))
  {
    exit("Таких пользователей нет, попробуйте ввести другие данные");
  }


// COOKIE
  foreach($user as $usr)
  {
    setcookie("user", $usr["login"], time() + 3600, "/");
  }

// Location
  header("Location: ../index.php")
?>
