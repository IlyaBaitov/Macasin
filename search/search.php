<?php
  // DB
    require("../config/db.php");

  // $_POST variables
    $search = strip_tags(trim($_GET["search"]));
    $search_radio = $_GET["search_radio"];

  // Validation
    if($search == "")
    {
      exit("Вводи, что тебе нужно.");
    }
  // SQL request
    if($search_radio == "users")
    {
      $sql = "SELECT * FROM `users` WHERE `login` LIKE '%$search%' ";
    } else {
      $sql = "SELECT * FROM `products` WHERE `title` LIKE '%$search%' ";
    }
    $query = $pdo->query($sql);

    while($row = $query->fetch(PDO::FETCH_OBJ))
    {
      echo "<ul>";
      if($search_radio == "users")
      {
        echo "<li><b>" . $row->login . "</b></li>";
      } elseif($search_radio == "products") {
        echo "<li><b>" . $row->title . "</b></li>";
      }
      echo "</ul>";
    }

?>
