<?php
session_start();
session_unset();
session_destroy();
header("Location: erik1331_login.php");
?>