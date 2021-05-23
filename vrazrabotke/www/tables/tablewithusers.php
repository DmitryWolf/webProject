<?php
if (!isset($_COOKIE['llogin'])){
  header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица пользователей</title>
    <link href="../style.css" rel="stylesheet" type="text/css"/>
    <style>
      body { 
        background: url(../design/bg.jpg); 
        background-size: 100%;
        font-size: 1.5em;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" height="75">
      <tr>
        <td class="col" align="center" width="23%">
          <form name=myform1 action=tracks.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Треки</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform2 action=performers.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Исполнители</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform3 action=genres.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Жанры</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform4 action=albums.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Альбомы</font></button></p>
          </form>
        </td>
        <td class="col" width="2.5%">
        <p><a href="../account.php"><img src="../icon.svg" width="90%" height="90%" align="center"></a></p>
        </td>
      </tr>
    </table>
<br>
<a href=page2.php>
      <button class="new" style="width:10%;height:20%"><font size="5" face="Times New Roman">На главную</font></button></a>
    <?php
      $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
      if ($mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
      }
      $result = $mysqli->query("SELECT id, login, password, name, surname, email, admin FROM users");
      echo "<h1 align=center><font color=FFFFFF>Пользователи</h1>";
      echo "<table border='0' width='100%' cellpadding='5'>
      <tr>
      <th><font color=FFFFFF>id</font></th>
      <th><font color=FFFFFF>Логин</font></th>
      <th><font color=FFFFFF>Пароль</font></th>
      <th><font color=FFFFFF>Имя</font></th>
      <th><font color=FFFFFF>Фамилия</font></th>
      <th><font color=FFFFFF>Почта</font></th>
      <th><font color=FFFFFF>Админ</font></th>
      </tr>";
      while ($myrow = mysqli_fetch_array($result)) {
        $id = $myrow['id'];
        $log = $myrow['login'];
        $pass = $myrow['password'];
        $name = $myrow['name'];
        $surname = $myrow['surname'];
        $email = $myrow['email'];
        $admin = $myrow['admin'];
        echo "<tr>
        <td><font color=FFFFFF>$id</font></td>
        <td><font color=FFFFFF>$log</font></td>
        <td><font color=FFFFFF>$pass</font></td>
        <td><font color=FFFFFF>$name</font></td>
        <td><font color=FFFFFF>$surname</font></td>
        <td><font color=FFFFFF>$email</font></td>
        <td><font color=FFFFFF>$admin</font></td>
        </tr>";
      }
    ?>
  <table cellpadding="0" border="0" align="center" width="100%" height="100%">
    <tr>
      <td align="left" width="20%"></td>
      <td align="center" width="60%">  
        <p><h7 align="center"><font size="7" color="E0FFFF" face="Times New Roman"></font> </p>
      </td>
      <td align="right" width="20%"></td>
    </tr>
  </table>
</body>
</html>