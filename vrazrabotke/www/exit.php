<?php
setcookie('llogin', "", time() - 900);
setcookie('ppassword', "", time() - 900);
setcookie('nname', "", time() - 900);
setcookie('ssurname', "", time() - 900);
setcookie('eemail', "", time() - 900);
setcookie('aadmin', "", time() - 900);
header('Location: index.php');
?>