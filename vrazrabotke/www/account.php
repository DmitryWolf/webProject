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
    </style>
</head>
<body>
<?php
        if ($_COOKIE['checkchange'] == 1){
        ?>
        <script>
          document.addEventListener('readystatechange', event => { 
            if (event.target.readyState === "complete") {
              alert("Вы успешно сменили пароль!");
            }
          });
        </script>
        <?php
        }
        ?>
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

<br>
<a href=../page2.php>
      <button class="new" style="width:10%;height:20%"><font size="5" face="Times New Roman">На главную</font></button></a>
<table cellpadding="0" border="0" align="center" width="100%" height="100%">
      <tr>
        <td align="left" width="20%"></td>
        <td align="center" width="60%">  
          <p><h1 align="center"><font size="7" color="FFFFFF" face="Comic Sans MS">Аккаунт</font></h1></p>
          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Логин: 
          <?php
          echo $_COOKIE['llogin'];
          ?>
          </font></p>

          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Пароль: 
          <?php
          echo $_COOKIE['ppassword'];
          ?>
          </font></p>

          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Имя: 
          <?php
          echo $_COOKIE['nname'];
          ?>
          </font></p>

          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Фамилия: 
          <?php
          echo $_COOKIE['ssurname'];
          ?>
          </font></p>

          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Почта: 
          <?php
          echo $_COOKIE['eemail'];
          ?>
          </font></p>
          <a href="exit.php" class="gradient-button">Выйти</a>
        </td>
        <td align="right" width="20%"></td>
      </tr>
    <tr>
    <td align="left" width="20%"></td>
      <td align="center" width="60%"> 
        <br>
        <form name=changepassword action=changepass.php method=POST>
          <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Изменить пароль</font></p>
          <div class="password">
	<input type="password" id="password-input" placeholder="Новый пароль" name="newpass" required>
	<a href="#" class="password-control"></a>
</div>
<style type="text/css">
.password {
	width: 300px;
	margin: 15px auto;
	position: relative;
}
#password-input {
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
.password-control {
	position: absolute;
	top: 11px;
	right: 6px;
	display: inline-block;
	width: 20px;
	height: 20px;
	background: url(https://snipp.ru/demo/495/view.svg) 0 0 no-repeat;
}
.password-control.view {
	background: url(https://snipp.ru/demo/495/no-view.svg) 0 0 no-repeat;
}
</style>

<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script>
$('body').on('click', '.password-control', function(){
	if ($('#password-input').attr('type') == 'password'){
		$(this).addClass('view');
		$('#password-input').attr('type', 'text');
	} else {
		$(this).removeClass('view');
		$('#password-input').attr('type', 'password');
	}
	return false;
});
</script><button class="gradient-button">Изменить</button>
</form>
      </td>
      <td align="right" width="20%"></td>
    </tr>

    <tr>
    <td align="left" width="20%"></td>
      <td align="center" width="60%">
      <?php
      if ($_COOKIE['aadmin'] != 0){
        ?>
        <p><h7 align="center"><font size="5" color="FFFFFF" face="Comic Sans MS">Вы являетесь администратором, поэтому вам доступны следующие функции</font></p>
        <p><a href="newdata.php" class="gradient-button">Добавить данные</a></p>
        <p><a href="tables/tablewithusers.php" class="gradient-button">Список пользователей</a></p>
        <?php
      }
      ?>
      </td>
      <td align="right" width="20%"></td>
    </tr>
    </table>
</body>
</html>






