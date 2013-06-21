<?php
session_start();
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/cart.php");

$oForm = new Form();


if(isset($_POST["submit"])){

    $oTestCustomer = new Customer();
    $bLoadResult =  $oTestCustomer->loadByUserName($_POST["username"]); 

    if($bLoadResult == false){

         $oForm->raiseCustomError("username","Username doesn't exist");

    }else{
        if($oTestCustomer->password == $_POST["password"]){

            $_SESSION["currentUser"] = $oTestCustomer->customerID;

            $oCart = new Cart();
            
            $_SESSION['cart'] = $oCart;

            header("Location: index.php"); 
            exit;

        }else{

            $oForm->raiseCustomError("password","Password is incorrect");
        }
    }
} 

$oForm->makeInput("username", "Username");
$oForm->makePass("password", "Password");
$oForm->makeSubmit("submit", "Login");

?>
    
    <h1>Login<span></span></h1>
    <div id="login-butt"> <?php echo $oForm->html; ?> </div>

<?php

require_once("includes/foot.php");

?>