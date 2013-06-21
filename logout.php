<?php
session_start();

unset($_SESSION["currentUser"]);
unset($_SESSION["cart"]);

header("Location: index.php"); 

 ?>