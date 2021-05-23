<?php
if (!isset($_COOKIE['llogin'])){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Музыкальная библиотека</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
      body { 
        background: url(design/newbg.jpg); 
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
          <form name=myform1 action=tables/tracks.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Треки</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform2 action=tables/performers.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Исполнители</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform3 action=tables/genres.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Жанры</font></button></p>
          </form>
        </td>
        <td class="col" align="center" width="23%">
          <form name=myform4 action=tables/albums.php method=POST>
          <p><button class="transparent" style="width:100%;height:100%"><font size="5" color="FFFFFF" face="Comic Sans MS">Альбомы</font></button></p>
          </form>
        </td>
        <td class="col" width="2.5%">
        <p><a href="account.php"><img src="icon.svg" width="90%" height="90%" align="center"></a></p>
        </td>
      </tr>
    </table>

    <table cellpadding="0" border="0" align="center" width="100%" height="100%">
      <tr>
        <td align="left" width="20%"></td>
        <td align="center" width="60%">  
          <p><h1 align="center"><font size="7" color="FFFFFF" face="Comic Sans MS">А что дальше?</font></h1></p>
          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">На данном сайте в вашем распоряжении имеется панель сверху, где вы можете выбрать список треков, исполнителей, жанров или альбомов. Тажке, вы можете найти здесь интересную вам информацию, а также отсортировать выведенный список</font> </p>
        </td>
        <td align="right" width="20%"></td>
      </tr>
    </table>
  </body>
</body>
</html>