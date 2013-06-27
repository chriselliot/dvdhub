<?php 

class customerView {

	public function render($oCustomer){

		$sHTML = '<div id="mydetails"><h1>My Details</h1>';
	    $sHTML .= '<p><span>First Name:</span>'.htmlentities($oCustomer->firstname).'<br />';
	    $sHTML .= '<span>Last Name:</span>'.htmlentities($oCustomer->lastname).'<br />';
	    $sHTML .= '<span>Address:</span>'.htmlentities($oCustomer->address).'<br />';
	    $sHTML .= '<span>Phone Number:</span>'.htmlentities($oCustomer->phone).'<br />';
	    $sHTML .= '<span>Email Address:</span>'.htmlentities($oCustomer->email).'<br />';
	    $sHTML .= '<span>Username:</span>'.htmlentities($oCustomer->username).'</p>';
	    $sHTML .= '<a href="editmydetails.php">Edit My Details</a>';
	    $sHTML .= '</div>';

	    return $sHTML;
	}
	
}

?>
