<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Добавление товара</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <form action="#" method="post">
            <h1>Добавление товара</h1>
            <input type="text" name="title" id="title" placeholder="Название"></br>
            <input type="text" name="price" id="price" placeholder="Цена"></br>
            <textarea name="description" id="description" placeholder="Описание" rows="4" cols="40"></textarea></br>
            <input type="submit" name="submit" id="submit" value="Добавить"></br>
          </form>
        </div>
      </div>
    </div>

    <?php
    // DB
      require("../config/db.php");

    // $_POST variables
      @$title = strip_tags(trim($_POST["title"]));
      @$price = strip_tags(trim($_POST["price"]));
      @$description = strip_tags(trim($_POST["description"]));

    // Validation
      if($title == "" || $price == "" || $description == "")
      {
        exit("Введи данные! Ну же!");
      }
    // SQL request
      $sql = "INSERT INTO `products` (`title`, `price`, `description`) VALUES (:title, :price, :description)";
      $query = $pdo->prepare($sql);
      $query->execute([
        "title" => $title,
        "price" => $price,
        "description" => $description,
      ]);

      header("Location: ../index.php");
    ?>

  </body>
</html>
