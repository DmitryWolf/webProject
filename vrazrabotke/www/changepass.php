<?php
$newpass = $_POST['newpass'];
$log = $_COOKIE['llogin'];

$conn = new mysqli("localhost", "root", "", "musicallibrary");
    if ($mysqli->connect_errno) {
      printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
      exit();
    }
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users SET password='$newpass' WHERE login = '$log'";

if ($conn->query($sql) === TRUE) {
    setcookie('ppassword', $newpass, time() + 900);
    $check = 1;
    setcookie('checkchange', $check, time() + 5);
    $conn->close();
    header('Location: account.php');
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>