<?php
    $mysqli = new mysqli("localhost", "root", "", "musicallibrary");
    if ($mysqli->connect_errno) {
      printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
      exit();
    }
    $log = $_POST['login'];
    $pass = $_POST['password'];
    
    $result = $mysqli->query("SELECT login, password, name, surname, email, admin FROM users WHERE login = '$log'");
    if ($result->num_rows > 0){
        $count = 0;
        while ($myrow = mysqli_fetch_array($result)) {
            $login = $myrow['login'];
            $password = $myrow['password'];
            $name = $myrow['name'];
            $surname = $myrow['surname'];
            $email = $myrow['email'];
            $admin = $myrow['admin'];

            if ($pass != $password){
                $check = 2;
                setcookie('checklog', $check, time() + 5);
                header('Location: login.php');
            }
            else {
                
                setcookie('llogin', $login, time() + 1800);
                setcookie('ppassword', $password, time() + 1800);
                setcookie('nname', $name, time() + 1800);
                setcookie('ssurname', $surname, time() + 1800);
                setcookie('eemail', $email, time() + 1800);
                setcookie('aadmin', $admin, time() + 1800);
                header('Location: page2.php');
            }
        }
    }
    else {
        $check = 1;
        setcookie('checklog', $check, time() + 5);
        header('Location: login.php');
    }
?>