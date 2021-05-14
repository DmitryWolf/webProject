<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сайтик</title>
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
  .box{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 400px;
    padding: 40px;
    background: rgba(0, 0, 0, 0.6);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    border-radius: 10px;
  }
  .box h2{
    margin: 0 0 30px;
    padding: 0px;
    color: #fff;
    text-align: center;
  }
  .box .input-box{
    position: relative;
  }
  .box .input-box input{
    width: 100%;
    padding: 10px 0px;
    font-size: 16px;
    color: #fff;
    letter-spacing: 1px;
    margin-bottom: 30px;
    border: none;
    outline: none;
    background: transparent;
    border-bottom: 1px solid #fff;
  }
  .box .input-box label{
    position: absolute;
    top: 0;
    left: 0;
    letter-spacing: 1px;
    padding: 10px 0px;
    font-size: 16px;
    color: #fff;
    transition: .5s;
  }
  .box .input-box input:focus ~ label,
  .box .input-box input:valid ~ label{
    top: -18px;
    left: 0px;
    color: #03a9f4;
    font-size: 12px;
  }
  .box input[type="submit"]{
    background: transparent;
    border: none;
    outline: none;
    color: #fff;
    background: #227be3;
    padding: 10px 20px;
    border-radius: 5px;
    cursor:pointer;
  }
  .box input[type="submit"]:hover{
    background-color: #3067b9;
  }
  .center { 
    text-align: center; 
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
  <div class="box">
    <h2>Login</h2>
    <form id="formElem" action="test.php" method=POST>
        <div class="input-box">
            <input type="text" name="username"  autocomplete="off" required>
            <label for="">Login</label>
        </div>
        <div class="input-box">
            <input type="password" name="password"  autocomplete="off" required>
            <label for="">Password</label>
        </div>
        <div class="center">
            <input type="submit" value="Login">
        </div>
        <br>
    </form>
</body>
</html>