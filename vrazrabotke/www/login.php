<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайтик</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <style>
  body { background: url(background.jpg);
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
<?php
        if ($_COOKIE['checklog'] == 1){
        ?>
        <script>
          document.addEventListener('readystatechange', event => { 
            if (event.target.readyState === "complete") {
              alert("Неверный логин!");
            }
          });
        </script>
        <?php
        } else if ($_COOKIE['checklog'] == 2){
          ?>
        <script>
          document.addEventListener('readystatechange', event => { 
            if (event.target.readyState === "complete") {
              alert("Неверный пароль!");
            }
          });
        </script>
        <?php
        }
        ?>
<form name=myform1 action=index.php method=POST>
        <button class="new" style="width:10%;height:10%"><font size="5" face="Times New Roman">На главную</font></button>
    </form>
  <div class="box">
    <h2>Login</h2>
    <form id="formElem" action="savelog.php" method=POST>
        <div class="input-box">
            <input type="text" name="login"  autocomplete="off" required>
            <label for="">Login</label>
        </div>
        <div class="input-box">
            <input type="password" name="password"  autocomplete="off" required>
            <label for="">Password</label>
        </div>
        <div class="center">
            <input type="submit" value="Login">
        </div>
        <div class="center">
        <font size="4" color="FFFFFF" face="Calibri">
          <p>Нет аккаунта?</p><a href="reg.php">Зарегистрироваться</a>
        </font>
        </div>
        <br>
    </form>
</body>
</html>