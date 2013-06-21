<?php
require_once("includes/cart.php");
require_once("includes/dvd.php");
session_start();

if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

   }else{

   	$iProductID = $_GET["productID"];
   	$oDvd = new Dvd();
   	$oDvd->load($iProductID );

    $oCart = $_SESSION["cart"];
	$oCart->add($iProductID,1);

	header("Location: category.php?typeID=".$oDvd->typeID); 
	exit;

  }


?>