<?php

require_once ('menuView.php');
require_once('genreManager.php');
$oMV = new MenuView();
$oGM = new GenreManager();

$aAllGenre = $oGM->getAllGenre();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>DVD HUB - New Release DVDs</title>
        <link href="assets/css/main.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    </head> 
    <body>
    <div id="container">
    	<div id="header">
    		<a href="index.php"><img id="logo" src="assets/images/logo.png" width="169" height="169" alt="logo"></img></a>
    		<h1>New release DVDs <br />at <span>ridiculously low </span>prices</h1>
    		<ul id="buttons">
    			<li><a href="login.php" id="login">Login</a></li>
    			<li><a href="register.php" id="register">Register</a></li>
    			<li><a href="" id="mycart">My Cart</a></li>
                <li><a href="mydetails.php" id="mydetails">My Details</a></li>
    		</ul>
    	</div>

    		<?php  echo $oMV->render($aAllGenre); ?>

    	<div id="main">