<?php

require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");

$oForm = new Form();

if(isset($_POST["submit"])){

    $oForm->data = $_POST;  
    $oForm->checkRequired("firstname");
    $oForm->raiseCustomError("firstname","test");
    $oForm->checkRequired("lastname");
    $oForm->checkRequired("address");
    $oForm->checkRequired("phone");
    $oForm->checkRequired("email");
    $oForm->checkRequired("username");
    $oForm->checkRequired("password");
    $oForm->checkRequired("confirmpassword");
       

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