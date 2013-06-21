<?php
require_once("includes/cart.php");
session_start();

if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

   }else{

   	$iProductID = $_GET['productID'];

    $oCart = $_SESSION["cart"];
	$oCart->remove($iProductID,1);

	header("Location: mycart.php"); 
	exit;

  }


?>