<?php
if (!isset($_COOKIE['llogin'])){
  header('Location: index.php');
}
    $trackName = $_POST['trackName'];
    $trackIdPerformer = $_POST['trackIdPerformer'];
    $trackIdAlbum = $_POST['trackIdAlbum'];
    $trackTime = $_POST['trackTime'];
    $trackLyrics = $_POST['trackLyrics'];

    $performerName = $_POST['performerName'];
    $performerYears = $_POST['performerYears'];
    $performerAlive = $_POST['performerAlive'];
    $performerDescription = $_POST['performerDescription'];

    $genreName = $_POST['genreName'];
    $genreDescription = $_POST['genreDescription'];

    $albumName = $_POST['albumName'];
    $albumIdPerformer = $_POST['albumIdPerformer'];
    $albumIdGenre = $_POST['albumIdGenre'];
    $albumDateRelease = $_POST['albumDateRelease'];
    $albumPicture = $_POST['albumPicture'];
    
    $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
    if ($mysqli->connect_errno) {
      printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
      exit();
    }
    $con_str = mysql_connect('localhost', 'root', '', 'musicallibrary');
    mysql_select_db('musicallibrary', $con_str);

    if ($trackName != ""){
        $query_str="INSERT INTO `musicallibrary`.`tracks` (`name`, `album_id`, `artist_id`, `playtime`, `lyrics`) VALUES ('$trackName', '$trackIdAlbum', '$trackIdPerformer', '$trackTime', '$trackLyrics')";
        mysql_query($query_str, $con_str);
        $check = 1;
    }
    else if ($performerName != ""){
        $query_str="INSERT INTO `musicallibrary`.`artists` (`name`, `years_active`, `alive`, `description`) VALUES ('$performerName', '$performerYears', '$performerAlive', '$performerDescription')";
        mysql_query($query_str, $con_str);
        $check = 2;
    }

    if ($genreName != ""){
        $query_str="INSERT INTO `musicallibrary`.`genres` (`name`, `description`) VALUES ('$genreName', '$genreDescription')";
        mysql_query($query_str, $con_str);
        $check = 3;
    }

    else if ($albumName != ""){
        $query_str="INSERT INTO `musicallibrary`.`albums` (`name`, `artist_id`, `genre_id`, `release_date`, `picture`) VALUES ('$albumName', '$albumIdPerformer', '$albumIdGenre', '$albumDateRelease', '$albumPicture')";
        mysql_query($query_str, $con_str);
        $check = 4;
    }
    mysql_close();
    setcookie('checkadd', $check, time() + 5);
    header ('Location: newdata.php');
?>