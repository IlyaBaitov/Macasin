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

    <?php // if(@$_COOKIE["user"] == ""): ?>
        <!-- Регистрация -->
        <div class="container">
          <div class="row">
            <div class="col">
              <form action="./reg_auth/reg.php" method="post">
                <h1>Регистрация</h1></br>
                <input type="login" name="login" id="login" placeholder="Введите логин" class="form-control"></br>
                <input type="password" name="pass" id="pass" placeholder="Введите пароль" class="form-control"></br>
                <input type="email" name="login" id="login" placeholder="Введите email" class="form-control"></br>
                <input type="submit" name="sub_reg" value="Зарегистрироваться" class="btn btn-success">
              </form>
            </div>

        <!-- Авторизация -->
            <div class="col">
              <form action="./reg_auth/auth.php" method="post">
                <h1>Авторизация</h1></br>
                <input type="login" name="login" id="login" placeholder="Введите логин" class="form-control"></br>
                <input type="password" name="pass" id="pass" placeholder="Введите пароль" class="form-control"></br>
                <input type="submit" name="sub_auth" value="Авторизоваться" class="btn btn-success">
              </form>
            </div>
          </div>
        </div>
    <?php // else: ?>
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
      <!-- Добавление товаров -->
      <!-- Редактирование товаров -->
    <?php // endif; ?>

    <?php require("./html/footer.html"); ?>
  </body>
</html>
