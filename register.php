<?php

require_once("includes/head.php");
require_once("includes/form.php");


$oForm = new Form();
$oForm->makeInput("firstname","First Name");
$oForm->makeInput("lastname","Last Name");
$oForm->makeTextArea("address","Address");
$oForm->makeInput("phone","Phone Number");
$oForm->makeInput("email", "Email Address");
$oForm->makeInput("username", "Username");
$oForm->makeInput("password", "Password");
$oForm->makeSubmit("submit", "Register");


?>
    
    <h1>Register with <span>DVD HUB</span></h1>

<?php

	echo $oForm->html;

require_once("includes/foot.php");

?>