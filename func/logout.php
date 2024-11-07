<?php
/*При выходе удаляем cookie*/
setcookie('email', $email, time() - 3600 * 24 * 30, "/");

header('Location: ../public/noauth.php');

?>