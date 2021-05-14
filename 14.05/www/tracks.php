<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>в разработке</title>
    <style>
      body { 
        background: url(background.jpg); 
        background-size: 100%;
        font-size: 1.5em;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      button.new {
   background: -moz-linear-gradient(#D0ECF4, #5BC9E1, #D0ECF4);
   background: -webkit-gradient(linear, 0 0, 0  100%, from(#D0ECF4), to(#D0ECF4), color-stop(0.5, #5BC9E1));
   filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00BBD6', endColorstr='#EBFFFF');
   padding: 3px 7px;
   color: #333;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   border-radius: 5px;
   border: 1px solid #666;
  }
    </style>
</head>
<body>
  <form name=myform1 action=index.html method=POST>
    <button class="new" style="width:10%;height:10%"><font size="5" face="Times New Roman">На главную</font></button>
  </form>
    <?php
      $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
      if ($mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
      }
      $result = $mysqli->query("SELECT id, name, album_id, format_id, playtime, lyrics FROM tracks");
      echo "<h1 align=center><font color=FFFFFF>Треки</font></h1>";
      echo "<table border='1' width='100%' cellpadding='5'>
      <tr>
      <th><font color=FFFFFF> Id </font></th>
      <th><font color=FFFFFF> Название </font></th>
      <th><font color=FFFFFF> Id альбома </font></th>
      <th><font color=FFFFFF> Id формата </font></th>
      <th><font color=FFFFFF> Продолжительность </font></th>
      <th><font color=FFFFFF> Слова </font></th>
      </tr>";
      while ($myrow = mysqli_fetch_array($result)) {
        $id = $myrow['id'];
        $name = $myrow['name'];
        $album_id = $myrow['album_id'];
        $format_id = $myrow['format_id'];
        $playtime = $myrow['playtime'];
        $lyrics = $myrow['lyrics'];
        echo "<tr>
        <td><font color=FFFFFF>$id</font></td>
        <td><font color=FFFFFF>$name</font></td>
        <td><font color=FFFFFF>$album_id</font></td>
        <td><font color=FFFFFF>$format_id</font></td>
        <td><font color=FFFFFF>$playtime</font></td>
        <td><font color=FFFFFF>$lyrics</font></td>
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