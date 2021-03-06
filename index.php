<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Select</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>

    <?php require("./config/db.php"); ?>

    <?php require("./html/head.html"); ?>

    <?php if(@$_COOKIE["user"] == ""): ?>
        <!-- Регистрация -->
        <div class="container">
          <div class="row">
            <div class="col">
              <form action="./reg_auth/reg.php" method="post">
                <h1>Регистрация</h1></br>
                <input type="login" name="login" id="login_reg" placeholder="Введите логин" class="form-control"></br>
                <input type="password" name="pass" id="pass_reg" placeholder="Введите пароль" class="form-control"></br>
                <input type="email" name="email" id="email_reg" placeholder="Введите email" class="form-control"></br>
                <input type="submit" name="sub_reg" value="Зарегистрироваться" class="btn btn-success">
              </form>
            </div>

        <!-- Авторизация -->
            <div class="col">
              <form action="./reg_auth/auth.php" method="post">
                <h1>Авторизация</h1></br>
                <input type="login" name="login" id="login_auth" placeholder="Введите логин" class="form-control"></br>
                <input type="password" name="pass" id="pass_auth" placeholder="Введите пароль" class="form-control"></br>
                <input type="submit" name="sub_auth" value="Авторизоваться" class="btn btn-success">
              </form>
            </div>
          </div>
        </div>
    <?php else: ?>
      <!-- Пользователь -->
      <p><a href="./user/user_page"><?php echo $_COOKIE["user"] ?></a> </br> <a href="./reg_auth/exit.php">Выйти</a></p>

      <!-- Названия, поиск, о нас -->
      <div class="container">
        <div class="row">
          <div class="col">
            <h3>Поиск</h3>
            <form action="./search/search.php" method="get">
              <input type="search" name="search" id="search" placeholder="Что ищите?"></br>
              <input type="radio" name="search_radio" id="users" value="users" checked>
              <label for="users">Пользователи</label>
              <input type="radio" name="search_radio" id="products" value="products">
              <label for="products">Обувь</label>
              <input type="submit" name="sub_search" value="Найти">
            </form>
          </div>
        </div>
      </div>
      <!-- Вывод товаров -->
        <?php
          // DB
            require("./config/db.php");

          // SQL request
            $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
            $query = $pdo->query($sql);

          // Products with delete / update
            while($row = $query->fetch(PDO::FETCH_OBJ))
            {
              echo "<pre>";
              echo "<a href='./products/del_up.php?id=".$row->id."'>" . $row->title . "</a>" . "  " . $row->price . "  " . $row->description;
              echo "</pre>";
            }
        ?>
      <!-- Добавление товаров -->
      <?php if($_COOKIE["user"] == "admin"): ?>
        <a href="./products/add.php"><p>Добавить товар</p></a>
      <!-- Редактирование товаров -->

      <!-- Удаление товаров -->

      <?php endif; ?>
    <?php endif; ?>

    <?php require("./html/footer.html"); ?>
  </body>
</html>
