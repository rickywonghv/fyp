<?php
session_start();
session_destroy();
session_unset();
setcookie("uid", "", time() - 3600);
setcookie("type", "", time() - 3600);
header("Location:../../");
?>
