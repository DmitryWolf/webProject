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
    <title>в разработке</title>
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
      .btext {
	      width: 300px;
	      margin: 15px auto;
	      position: relative;
      }
      #btext-input {
	      width: 100%;
	      padding: 5px 0;
	      height: 30px;
	      line-height: 40px;
	      text-indent: 10px;
	      margin: 0 0 15px 0;
	      border-radius: 5px;
	      border: 1px solid #999;
	      font-size: 18px;
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
    
<table cellpadding="0" border="0" align="center" width="100%" height="100%">
    <tr>
      <td align="center" width="10%"><a href=../page2.php>
      <button class="new" style="width:100%;height:30%"><font size="5" face="Times New Roman">На главную</font></button></a>
    </td>
      <td align="center" width="80%">  
      <form name=tracks action=sort.php method=POST>
      <div align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">
      <p><h4 align="center"><font size="6">Сортировать по</font></h4></p>
           Названию  <input type=radio name=tracks value=trackName>
           Времени  <input type=radio name=tracks value=trackTime>
           Исполнителю  <input type=radio name=tracks value=trackPerformer >
      </font></div>
      </td>
      <td align="center" width="10%">
      <button class="new" style="width:100%;height:30%"><font size="5" face="Times New Roman">Сортировать</font></button>
      </form>
    </tr>
    <tr>
      <td align="center" width="10%"></td>
      <td align="center" width="80%">  
      <div align="center">
      <form name=search action=search.php method=POST>
      <div class="btext">
	      <input type="text" id="btext-input" placeholder="Поиск" name="trackSearch" autocomplete="off" required>
      </div>
      </div>
      </td>
      <td align="center" width="10%">
      <button class="gradient-button">Поиск</button></form>
      </td>
    </tr>
  </table>
  <?php
      $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
      if ($mysqli->connect_errno) {
        printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
        exit();
      }
      $result = $mysqli->query("SELECT tracks.name AS track,
      albums.name AS album,
      artists.name AS artist, playtime, lyrics
      FROM tracks
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN albums ON album_id = albums.id");
      
      echo "<h1 align=center><font color=FFFFFF>Треки</font></h1>";
      echo "<table border='1' width='100%' cellpadding='5'>
      <tr>
      <th><font color=FFFFFF> Название </font></th>
      <th><font color=FFFFFF> Альбом </font></th>
      <th><font color=FFFFFF> Исполнитель </font></th>
      <th><font color=FFFFFF> Время </font></th>
      <th><font color=FFFFFF> Текст </font></th>
      </tr>";
      while ($myrow = mysqli_fetch_array($result)) {
        $track = $myrow['track'];
        $album = $myrow['album'];
        $artist = $myrow['artist'];
        $playtime = $myrow['playtime'];
        $lyrics = $myrow['lyrics'];
        echo "<tr>
        <td><font color=FFFFFF><div align=center>$track</font></td>
        <td><font color=FFFFFF><div align=center>$album</font></td>
        <td><font color=FFFFFF><div align=center>$artist</font></td>
        <td><font color=FFFFFF><div align=center>$playtime</font></td>
        <td><font color=FFFFFF><div align=center>$lyrics</font></td>
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