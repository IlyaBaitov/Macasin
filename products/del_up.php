<?php
// DB
  require("../config/db.php");

// $_GET
  $id = $_GET["id"];

// SQL
  $sql = "SELECT * FROM `products` WHERE `id` = '$id'";
  $query = $pdo->prepare($sql);
  $query->execute();

// PRODUCT
  $product = $query->fetch(PDO::FETCH_ASSOC);

// PRODUCT fields
  $title = $product["title"];
  $price = $product["price"];
  $description = $product["description"];
?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Поменять содержимое товара</h1>
        <form action="#" method="post">
          <input type="text" name="title" id="title" value="<?php echo $title ?>"></br></br>
          <input type="text" name="price" id="price" value="<?php echo $price ?>"></br></br>
          <input type="text" name="description" id="description" value="<?php echo $description ?>"></br></br>
          <input type="submit" name="submit_up" value="Обновить">
        </form>
      </div>
    </div>
  </div>

<?php
  @$sub_up = $_POST["submit_up"];

// Если форма с верху отправлена, то отправь это всё в БД
  if(!empty($sub_up))
  {
    // $_POST from del_up.php
      @$title_up = strip_tags(trim($_POST["title"]));
      @$price_up = strip_tags(trim($_POST["price"]));
      @$description_up = strip_tags(trim($_POST["description"]));

    // SQL
      $sql = "UPDATE `products` SET `title` = '$title_up', `price` = '$price_up', `description` = '$description_up' WHERE `id` = '$id'";
      $query_up = $pdo->prepare($sql);
      $query_up->execute();
  }
?>

<a href="../index.php">Вернуться</a>
