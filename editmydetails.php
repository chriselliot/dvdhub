<?php
require_once("includes/cart.php");
session_start();
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/customer.php");

if(isset($_SESSION["currentUser"]) == false){

        header("Location: login.php"); 
        exit;

    }else{

        $iUserID = $_SESSION["currentUser"];
        $oCustomer = new customer();
        $oCustomer->load($iUserID);

		$aData = array();
		$aData["firstname"] = $oCustomer->firstname;
		$aData["lastname"] = $oCustomer->lastname;
		$aData["address"] = $oCustomer->address;
		$aData["phone"] = $oCustomer->phone;
		$aData["email"] = $oCustomer->email;
		
		$oForm = new Form();

		$oForm->data = $aData;

		if(isset($_POST["submit"])){
		 
		  $oForm->data = $_POST;

		  $oForm->checkRequired("firstname");
		  $oForm->checkRequired("lastname");
		  $oForm->checkRequired("address");
		  $oForm->checkRequired("phone");
		  $oForm->checkEmail("email");

		  if($oForm->valid == true){

		      $oCustomer->firstname = $_POST["firstname"];
		      $oCustomer->lastname = $_POST["lastname"];
		      $oCustomer->address = $_POST["address"];
		      $oCustomer->phone = $_POST["phone"];
		      $oCustomer->email = $_POST["email"];
		      $oCustomer->save();

		      header("Location:mydetails.php");
		      exit;

		  }

		}

		$oForm->makeInput("firstname","First Name");
		$oForm->makeInput("lastname","Last Name");
		$oForm->makeTextArea("address","Address");
		$oForm->makeInput("phone","Phone Number");
		$oForm->makeInput("email", "Email Address");
		$oForm->makeSubmit("submit", "Update My Details");

	}
?>

<h1>Edit <span>My Details</span></h1>

<div id="update"><?php echo $oForm->html; ?></div>

<?php
require_once("includes/foot.php");
?>