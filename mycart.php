<?php
session_start();
require_once("includes/head.php");

if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

    $sHTML = '
				<h1>My Cart</h1>
				<div id="cart-headings">
				    <h3 id="first-heading">Product:</h3>
				    <h3>Quantity:</h3>
				    <h3>Unit Price:</h3>
				    <h3>Total Price:</h3>
				    <h3>Remove:</h3>
				</div>

				<div class="cart-line">
				    <div class="product-cell">Anchorman: The Legend Continues (2013)</div>
				    <div class="cell">1</div>
				    <div class="cell">$29.90</div>
				    <div class="cell" id="total">$29.90</div>
				    <div class="cell"><a href="">Remove</a></div>
				</div>

				<div class="cart-line">
				    <div class="product-cell">Anchorman: The Legend Continues (2013)</div>
				    <div class="cell">1</div>
				    <div class="cell">$29.90</div>
				    <div class="cell" id="total">$29.90</div>
				    <div class="cell"><a href="">Remove</a></div>
				</div>

				<div class="cart-line">
				    <div class="product-cell">Anchorman: The Legend Continues (2013)</div>
				    <div class="cell">1</div>
				    <div class="cell">$29.90</div>
				    <div class="cell" id="total">$29.90</div>
				    <div class="cell"><a href="">Remove</a></div>
				</div>
    ';
  }

echo $sHTML;

require_once("includes/foot.php");

?>