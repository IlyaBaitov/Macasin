<?php
// DB
  require("../config/db.php");

// $_POST
  $login = strip_tags(trim($_POST["login"]));
  $pass = strip_tags(trim($_POST["pass"]));
  $email = strip_tags(trim($_POST["email"]));

// Validation
  if($login == "" || $pass == "" || $email == "")
  {
    exit("Неверно заполнены некоторые поля, попробуйте снова");
  }

  $pass = md5($pass);

// SQL
  $sql = "INSERT INTO `users` (`login`, `pass`, `email`) VALUES(:login, :pass, :email)";
  $query = $pdo->prepare($sql);
  $query->execute([
    "login" => $login,
    "pass" => $pass,
    "email" => $email,
  ]);

// Location
  header("Location: ../index.php");
?>
