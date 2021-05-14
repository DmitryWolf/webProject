<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>в разработке</title>
    <style>
      body { 
        background: url(background1.jpg); 
        background-size: 100%;
        font-size: 1.5em;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
    </style>
</head>
<body>
    <?php
      $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
      if ($mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
      }
      $result = $mysqli->query("SELECT id, login, password FROM users");
      echo "<h1 align=center>Пользователи</h1>";
      echo "<table border='1' width='100%' cellpadding='5'>
      <tr>
      <th>id</th>
      <th>Логин</th>
      <th>Пароль</th>
      </tr>";
      while ($myrow = mysqli_fetch_array($result)) {
        $id = $myrow['id'];
        $log = $myrow['login'];
        $pass = $myrow['password'];
        echo "<tr>
        <td>$id</td>
        <td>$log</td>
        <td>$pass</td>
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