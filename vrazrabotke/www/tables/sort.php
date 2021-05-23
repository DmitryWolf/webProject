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
<?php
    $genres = $_POST['genres'];
    $tracks = $_POST['tracks'];
    $performers = $_POST['performers'];
    $albums = $_POST['albums'];
    
    $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
    if ($mysqli->connect_errno) {
      printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
      exit();
    }

    if(!isset($genres) && !isset($tracks) && !isset($performers) && !isset($albums)){
        ?>
        <table cellpadding="0" border="0" align="center" width="100%" height="100%">
        <tr>
            <td align="center" width="10%">
                <a href=../page2.php><button class="new" style="width:100%;height:35%"><font size="5" face="Times New Roman">На главную</font></button></a>
            </td>
            <td align="center" width="80%">  
                <div align="center"><font size="5" color="FFFFFF" face="Calibri">
                <p><h4 align="center"><font size="6">Вы не выбрали сортировку!</font></h4></p>
            </td>
            <td align="center" width="10%"></td>
        <?php
    }
    else {
        ?>
        <a href=../page2.php><button class="new" style="width:15%;height:20%"><font size="5" face="Times New Roman">На главную</font></button></a>
        <?php
        if (isset($genres)){
        $result = $mysqli->query("SELECT name, description FROM genres ORDER BY name");
        echo "<h1 align=center><font color=FFFFFF>Жанры</font></h1>";
        echo "<table border='0' width='100%' cellpadding='5'>
        <tr>
        <th><font color=FFFFFF> Название </font></th>
        <th><font color=FFFFFF> Описание </font></th>
        </tr>";
        while ($myrow = mysqli_fetch_array($result)) {
          $id = $myrow['id'];
          $name = $myrow['name'];
          $description = $myrow['description'];
          echo "<tr>
          <td><font color=FFFFFF><div align=center>$name</font></td>
          <td><font color=FFFFFF><div align=center>$description</font></td>
          ";
        }
    }
    else if (isset($tracks)){
      if ($tracks == "trackName") {
        $result = $mysqli->query("SELECT tracks.name AS track,
      albums.name AS album,
      artists.name AS artist, playtime, lyrics
      FROM tracks
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN albums ON album_id = albums.id
      ORDER BY tracks.name");
      }
      else if ($tracks == "trackTime") {
        $result = $mysqli->query("SELECT tracks.name AS track,
      albums.name AS album,
      artists.name AS artist, playtime, lyrics
      FROM tracks
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN albums ON album_id = albums.id
      ORDER BY playtime");
      }
      else if ($tracks == "trackPerformer") {
        $result = $mysqli->query("SELECT tracks.name AS track,
      albums.name AS album,
      artists.name AS artist, playtime, lyrics
      FROM tracks
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN albums ON album_id = albums.id
      ORDER BY artist");
      }
      
      echo "<h1 align=center><font color=FFFFFF>Треки</font></h1>";
      echo "<table border='0' width='100%' cellpadding='5'>
      <tr>
      <th><font color=FFFFFF> Название </font></th>
      <th><font color=FFFFFF> Альбом </font></th>
      <th><font color=FFFFFF> Исполнитель </font></th>
      <th><font color=FFFFFF> Продолжительность </font></th>
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
      
    }
    ///////
    if (isset($performers)){
      if ($performers == "performerName") { //////
         $result = $mysqli->query("SELECT name, years_active, description FROM artists ORDER BY name");
      }
      else if ($performers == "performerYears") {
        $result = $mysqli->query("SELECT name, years_active, description FROM artists ORDER BY years_active");
      }
      echo "<h1 align=center><font color=FFFFFF>Исполнители</font></h1>";
      echo "<table border='0' width='100%' cellpadding='5'>
      <tr>
      <th><font color=FFFFFF> Имя </font></th>
      <th><font color=FFFFFF> Годы активности </font></th>
      <th><font color=FFFFFF> Описание </font></th>
      </tr>";
      while ($myrow = mysqli_fetch_array($result)) { 
        $name = $myrow['name'];
        $years_active = $myrow['years_active'];
        $description = $myrow['description'];
        echo "<tr>
        <td><font color=FFFFFF><div align=center>$name</font></td>
        <td><font color=FFFFFF><div align=center>$years_active</font></td>
        <td><font color=FFFFFF><div align=center>$description</font></td>
        </tr>";
      }
    }
    /////////
    else if (isset($albums)){
      if ($albums == "albumName") {
        $result = $mysqli->query("SELECT albums.name AS album, artists.name AS artist,
      genres.name AS genre,
      release_date FROM albums
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN genres ON genre_id = genres.id
      ORDER BY albums.name");
      }
      else if ($albums == "albumPerformer") {
        $result = $mysqli->query("SELECT albums.name AS album, artists.name AS artist,
      genres.name AS genre,
      release_date FROM albums
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN genres ON genre_id = genres.id
      ORDER BY artists.name");
      }
      else if ($albums == "albumGenre") {
        $result = $mysqli->query("SELECT albums.name AS album, artists.name AS artist,
      genres.name AS genre,
      release_date FROM albums
      INNER JOIN artists ON artist_id = artists.id
      INNER JOIN genres ON genre_id = genres.id
      ORDER BY genres.name");
      }
      echo "<h1 align=center><font color=FFFFFF>Альбомы</font></h1>";
     echo "<table border='0' width='100%' cellpadding='5'>
     <tr>
     <th><font color=FFFFFF> Имя </font></th>
     <th><font color=FFFFFF> Исполнитель </font></th>
     <th><font color=FFFFFF> Жанр </font></th>
     <th><font color=FFFFFF> Дата релиза </font></th>
     </tr>";
     while ($myrow = mysqli_fetch_array($result)) {
       $name = $myrow['album'];
       $artist = $myrow['artist'];
       $genre= $myrow['genre'];
       $release_date = $myrow['release_date'];
       echo "<tr>
       <td><font color=FFFFFF><div align=center>$name</font></td>
       <td><font color=FFFFFF><div align=center>$artist</font></td>
       <td><font color=FFFFFF><div align=center>$genre</font></td>
       <td><font color=FFFFFF><div align=center>$release_date</font></td>
       </tr>";
     }
    }
}
?>
</body>
</html>