<?php
    $log = $_POST['login'];
    $pass = $_POST['password'];
    $name = $_POST['userName'];
    $surname = $_POST['userSurname'];
    $email = $_POST['email'];
    $admin = 0;
    $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
    if ($mysqli->connect_errno) {
      printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
      exit();
    }

    $result1 = $mysqli->query("SELECT * FROM users WHERE login = '$log'");
    $count1 = $result1->num_rows;

    $result2 = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
    $count2 = $result2->num_rows;

    if ($count1 > 0){
        $check = 1;
        setcookie('checkreg', $check, time() + 5);
        header('Location: reg.php');
    } else if ($count2 > 0){
        $check = 2;
        setcookie('checkreg', $check, time() + 5);
        header('Location: reg.php');
    }
    else {
        setcookie('llogin', $log, time() + 1800);
        setcookie('ppassword', $pass, time() + 1800);
        setcookie('nname', $name, time() + 1800);
        setcookie('ssurname', $surname, time() + 1800);
        setcookie('eemail', $email, time() + 1800);
        setcookie('aadmin', $admin, time() + 1800);
        
        $con_str = mysql_connect('localhost', 'root', '', 'musicallibrary');
        mysql_select_db('musicallibrary', $con_str);
        $query_str="INSERT INTO `musicallibrary`.`users` (`login`, `password`, `name`, `surname`, `email`) VALUES ('$log', '$pass', '$name', '$surname', '$email')";
        mysql_query($query_str, $con_str);
        mysql_close();
              
        header ('Location: page2.php');
        exit();  
    }    
?>