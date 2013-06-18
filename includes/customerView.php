<?php 

class customerView {

	public function render($oCustomer){

		$sHTML = '<div id="mydetails"><h1>My Details</h1>';
	    $sHTML .= '<p><span>First Name:</span>'.$oCustomer->firstname.'<br />';
	    $sHTML .= '<span>Last Name:</span>'.$oCustomer->lastname.'<br />';
	    $sHTML .= '<span>Address:</span>'.$oCustomer->address.'<br />';
	    $sHTML .= '<span>Phone Number:</span>'.$oCustomer->phone.'<br />';
	    $sHTML .= '<span>Email Address:</span>'.$oCustomer->email.'<br />';
	    $sHTML .= '<span>Username:</span>'.$oCustomer->username.'</p>';
	    $sHTML .= '<a href="editmydetails.php">Edit My Details</a>';
	    $sHTML .= '</div>';

	    return $sHTML;
	}
	
}

?>
