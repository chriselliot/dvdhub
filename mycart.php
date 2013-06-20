<?php
require_once("includes/cart.php");
session_start();
require_once("includes/head.php");
require_once("includes/cartView.php");

if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{
	
	$oCart = $_SESSION['cart'];
    $oCV = new cartView();
    
  }

echo $oCV->render($oCart);

require_once("includes/foot.php");

?>


