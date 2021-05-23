<?php
if (!isset($_COOKIE['llogin'])){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
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
<?php
  if ($_COOKIE['checkadd'] == 1){
  ?>
    <script>
      document.addEventListener('readystatechange', event => { 
        if (event.target.readyState === "complete") {
          alert("Вы успешно добавили новый трек!");
        }
      });
    </script>
  <?php
  } else if ($_COOKIE['checkadd'] == 2){
  ?>
    <script>
      document.addEventListener('readystatechange', event => { 
        if (event.target.readyState === "complete") {
          alert("Вы успешно добавили нового исполнителя!");
        }
      });
    </script>
  <?php
  }
  else if ($_COOKIE['checkadd'] == 3){
  ?>
    <script>
      document.addEventListener('readystatechange', event => { 
        if (event.target.readyState === "complete") {
          alert("Вы успешно добавили новый жанр!");
        }
      });
    </script>
  <?php
  }
  else if ($_COOKIE['checkadd'] == 4){
    ?>
      <script>
        document.addEventListener('readystatechange', event => { 
          if (event.target.readyState === "complete") {
            alert("Вы успешно добавили новый альбом!");
          }
        });
      </script>
    <?php
  }    
?>




<a href=account.php>
      <button class="new" style="width:10%;height:20%"><font size="5" face="Times New Roman">Назад</font></button></a>
<table cellpadding="0" border="0" align="center" width="100%" height="100%">
    <tr>
    <td align="left" width="20%"></td>
      <td align="center" width="60%"> 

        <br>
        <form name=track action=add.php method=POST>
            <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Добавить трек</font></p>
            <div class="btext">
	            <input type="text" id="btext-input" placeholder="Название" name="trackName" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Id исполнителя" name="trackIdPerformer" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Id альбома" name="trackIdAlbum" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Время" name="trackTime" autocomplete="off">
                <input type="text" id="btext-input" placeholder="Текст" name="trackLyrics" autocomplete="off">
            </div>
            <button class="gradient-button">Добавить</button>
        </form>
        
        <form name=performer action=add.php method=POST>
            <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Добавить исполнителя</font></p>
            <div class="btext">
	            <input type="text" id="btext-input" placeholder="Имя" name="performerName" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Годы активности" name="performerYears" autocomplete="off">
                <input type="text" id="btext-input" placeholder="Описание" name="performerDescription" autocomplete="off">
            </div>
            <button class="gradient-button">Добавить</button>
        </form>

        <form name=genre action=add.php method=POST>
            <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Добавить жанр</font></p>
            <div class="btext">
	            <input type="text" id="btext-input" placeholder="Название" name="genreName" autocomplete="off" required>
              <input type="text" id="btext-input" placeholder="Описание" name="genreDescription" autocomplete="off">
            </div>
            <button class="gradient-button">Добавить</button>
        </form>

        <form name=album action=add.php method=POST>
            <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Добавить альбом</font></p>
            <div class="btext">
	            <input type="text" id="btext-input" placeholder="Название" name="albumName" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Id исполнителя" name="albumIdPerformer" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Id жанра" name="albumIdGenre" autocomplete="off" required>
                <input type="text" id="btext-input" placeholder="Дата релиза" name="albumDateRelease" autocomplete="off">
                <input type="text" id="btext-input" placeholder="Ссылка на фото" name="albumPicture" autocomplete="off">
            </div>
            <button class="gradient-button">Добавить</button>
        </form>



      </td>
      <td align="right" width="20%"></td>
    </tr>
    </table>
</body>
</html>






