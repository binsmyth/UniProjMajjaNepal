<?php
SESSION_START();
unset($_SESSION['username']);
SESSION_DESTROY();
header("location: ../index.php");
?>