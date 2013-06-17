<?php
session_start();
require_once("includes/head.php");
require_once("includes/customer.php");
     

    if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

        $iUserID = $_SESSION["currentUser"];
        $oCustomer = new customer();
        $oCustomer->load($iUserID);

        $sHTML = '<div id="mydetails"><h1>My Details</h1>';
        $sHTML .= '<p><span>First Name:</span>'.$oCustomer->firstname.'<br />';
        $sHTML .= '<span>Last Name:</span>'.$oCustomer->lastname.'<br />';
        $sHTML .= '<span>Address:</span>'.$oCustomer->address.'<br />';
        $sHTML .= '<span>Phone Number:</span>'.$oCustomer->phone.'<br />';
        $sHTML .= '<span>Email Address:</span>'.$oCustomer->email.'<br />';
        $sHTML .= '<span>Username:</span>'.$oCustomer->username.'<br />';
        $sHTML .= '<span>Password:</span>'.$oCustomer->password.'</p>';
        $sHTML .= '</div>';
    }

?>
    
    <?php echo $sHTML;

require_once("includes/foot.php");

?>