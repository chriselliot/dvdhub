<?php
require_once("includes/head.php");
require_once("includes/customer.php");
require_once("includes/customerView.php");
     

    if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

        $iUserID = $_SESSION["currentUser"];
        $oCustomer = new customer();
        $oCustomer->load($iUserID);
        $oCV = new customerView();
    }

?>
    
    <?php echo $oCV->render($oCustomer);

require_once("includes/foot.php");

?>