<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Сайтик</title>
    <style>
  body { 
    background: url(background.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
  }
  body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background-image: url(background.jpg);
    background-size: cover;
  }
</style>
</head>
<body>
<form name=myform1 action=index.php method=POST>
        <button class="new" style="width:10%;height:10%"><font size="5" face="Times New Roman">На главную</font></button>
    </form>
  <div class="box">
    <h2>Registration</h2>
    <form id="formElem" action="savereg.php" method=POST>
        <div class="input-box">
            <input type="text" name="login"  autocomplete="off" required>
            <label for="">Login</label>
        </div>
        <div class="input-box">
            <input type="password" name="password"  autocomplete="off" required>
            <label for="">Password</label>
        </div>
        <div class="input-box">
            <input type="text" name="userName"  autocomplete="off" required>
            <label for="">Name</label>
        </div>
        <div class="input-box">
            <input type="text" name="userSurname"  autocomplete="off" required>
            <label for="">Surname</label>
        </div>
        <div class="input-box">
            <input type="email" name="email"  autocomplete="off" required>
            <label for="">Email</label>
        </div>
        <div class="center">
          <input type="submit" value="Registration">
        </div>
        <div class="center">
        <font size="4" color="FFFFFF" face="Calibri">
          <p>Уже есть аккаунт?</p><a href="login.php">Войти</a>
        </font>
        </div>
        <?php
        if ($_COOKIE['checkreg'] == 1){
        ?>
        <script>
          document.addEventListener('readystatechange', event => { 
            if (event.target.readyState === "complete") {
              alert("Пользователь с таким логином уже зарегистрирован!");
            }
          });
        </script>
        <?php
        } else if ($_COOKIE['checkreg'] == 2){
          ?>
        <script>
          document.addEventListener('readystatechange', event => { 
            if (event.target.readyState === "complete") {
              alert("Пользователь с такой почтой уже зарегистрирован!");
            }
          });
        </script>
        <?php
        }
        ?>
        </div>
        <br>
    </form>
</body>
</html>