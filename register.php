<?php
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");
require_once("includes/class.phpmailer.php");

$oForm = new Form();

if(isset($_POST["submit"])){

    $oForm->data = $_POST;  
    $oForm->checkRequired("firstname");
    $oForm->checkRequired("lastname");
    $oForm->checkRequired("address");
    $oForm->checkRequired("phone");
    $oForm->checkEmail("email");
    $oForm->checkRequired("username");
    $oForm->checkRequired("password");
    $oForm->checkRequired("confirmpassword");
    
    $oTestCustomer = new Customer();
    $bLoadResult = $oTestCustomer->loadByUserName($_POST["username"]);
    
    if($bLoadResult == true){

         $oForm->raiseCustomError("username","Username already taken");
    }

    if($oForm->valid==true){

            $oCustomer = new Customer();
            $oCustomer->firstname = $_POST["firstname"];
            $oCustomer->lastname = $_POST["lastname"];
            $oCustomer->address = $_POST["address"];
            $oCustomer->phone = $_POST["phone"];
            $oCustomer->email = $_POST["email"];
            $oCustomer->username = $_POST["username"];
            $oCustomer->password = $_POST["password"];
            $oCustomer->password = $_POST["confirmpassword"];
            $oCustomer->save();

            $mail = new PHPMailer();
            $mail->SetFrom('info@dvdhub.co.nz', 'DVD Hub administrator');
            $mail->AddReplyTo('info@dvdhub.co.nz','DVD Hub administrator');
            $mail->AddAddress($_POST["email"], $_POST["firstname"].$_POST[" lastname"]);
            $mail->Subject = 'Welcome to DVD Hub';
            $mail->MsgHTML('Your registration with DVD Hub was successful.');
            $mail->AltBody = 'Your registration with DVD Hub was successful.';
            $mail->AddAttachment('assets/images/logo.png');

            //Send the message, check for errors
            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
              echo "Message sent!";
            }

            header("Location:index.php"); 
            exit;

    }

} 

$oForm->makeInput("firstname","First Name");
$oForm->makeInput("lastname","Last Name");
$oForm->makeTextArea("address","Address");
$oForm->makeInput("phone","Phone Number");
$oForm->makeInput("email", "Email Address");
$oForm->makeInput("username", "Username");
$oForm->makePass("password", "Password");
$oForm->makePass("confirmpassword", "Confirm Password");
$oForm->makeSubmit("submit", "Register");

?>
    
    <h1>Register with <span>DVD HUB</span></h1>

<?php

	echo $oForm->html;

require_once("includes/foot.php");

?>