<?php
require_once ('db-wrapper.php');

class Customer {

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $sAddress; 
	private $sTelephone; 
	private $sEmail; 
	private $sUserName; 
	private $sPassword;
	private $iAdmin;


	public function __construct(){

		$this->iCustomerID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sAddress = "";
		$this->sTelephone = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->sPassword = "";
		$this->iAdmin = 0;

	}
	
	//precon: ID to load must exist
	public function load($iCustomerID){

		$oDatabase = new Database();

		$sQuery = "SELECT CustomerID, FirstName, LastName, Address, Telephone, Email, UserName, Password, Admin FROM tbcustomer WHERE CustomerID='".$iCustomerID."'";

		$oResult = $oDatabase->query($sQuery);
		$aCustomer = $oDatabase->fetch_array($oResult);

		$this->iCustomerID = $aCustomer["CustomerID"];
		$this->sFirstName = $aCustomer["FirstName"];
		$this->sLastName = $aCustomer["LastName"];
		$this->sAddress = $aCustomer["Address"];
		$this->sTelephone = $aCustomer["Telephone"];
		$this->sEmail = $aCustomer["Email"];
		$this->sUserName = $aCustomer["UserName"];
		$this->sPassword = $aCustomer["Password"];
		$this->iAdmin = $aCustomer["Admin"];

		$oDatabase->close();
	}

	//does not require Username to exist
	public function loadByUserName($sUserName){

		$oDatabase = new Database();

		$sQuery = "SELECT CustomerID FROM tbcustomer WHERE UserName ='".$oDatabase->escape_value($sUserName)."'";
		$oResult = $oDatabase->query($sQuery);
		$aCustomer = $oDatabase->fetch_array($oResult);

		$oDatabase->close();
	
		if ($aCustomer != false){

			$this->load( $aCustomer["CustomerID"]);
			return true;
		}else {
			return false;
		}

		
	}

	public function save(){

		$oDatabase = new Database();

		if($this->iCustomerID == 0){
		
			$sQuery = "INSERT INTO tbcustomer (FirstName, LastName, Address, Telephone, Email, UserName, Password)
					VALUES ('".$oDatabase->escape_value($this->sFirstName)."',
						'".$oDatabase->escape_value($this->sLastName)."',
						'".$oDatabase->escape_value($this->sAddress)."',
						'".$oDatabase->escape_value($this->sTelephone)."', 
						'".$oDatabase->escape_value($this->sEmail)."', 
						'".$oDatabase->escape_value($this->sUserName)."', 
						'".$oDatabase->escape_value($this->sPassword)."')";
			
			$oResult = $oDatabase->query($sQuery);

		if($oResult == true){
			$this->iCustomerID = $oDatabase->get_insert_id();
		}else{
			die($sQuery . " is invalid.");
		}	

		}else{
			$sQuery = "UPDATE tbcustomer 
						SET FirstName = '".$oDatabase->escape_value($this->sFirstName)."',
							LastName = '".$oDatabase->escape_value($this->sLastName)."',
							Address = '".$oDatabase->escape_value($this->sAddress)."',
							Telephone = '".$oDatabase->escape_value($this->sTelephone)."',
							Email = '".$oDatabase->escape_value($this->sEmail)."'
						WHERE CustomerID = ".$oDatabase->escape_value($this->iCustomerID);
						

			$oResult = $oDatabase->query($sQuery);
			if($oResult == false){
				die($sQuery . " is invalid.");
			}
		}

	$oDatabase->close();

	}



	public function __get($sProperty){
		switch ($sProperty){
			case "customerID":
				return $this->iCustomerID;
				break;
			case "firstname":
				return $this->sFirstName;
				break;
			case "lastname":
				return $this->sLastName;
				break;
			case "address":
				return $this->sAddress;
				break;
			case "phone":
				return $this->sTelephone;
				break;
			case "email":
				return $this->sEmail;
				break;
			case "username":
				return $this->sUserName;
				break;
			case "password":
				return $this->sPassword;
				break;
			case "admin":
				return $this->iAdmin;
				break;
			default:
				die($sProperty . " cannot be read from.");
		}
	}

	public function __set($sProperty,$value){

		switch ($sProperty) {
			case 'firstname':
				$this->sFirstName = $value;
				break;
			case 'lastname':
				$this->sLastName = $value;
				break;
			case 'address':
				$this->sAddress = $value;
				break;
			case 'phone':
				$this->sTelephone = $value;
				break;
			case 'email':
				$this->sEmail = $value;
				break;
			case 'username':
				$this->sUserName = $value;
				break;
			case 'password':
				$this->sPassword = $value;
				break;			
			default:
				die($sProperty . " is unable to be written to");
		}
	}

}

// $oCustomer = new Customer();
// $bResult = $oCustomer->loadByUserName('weg');


// echo "<pre>";
// print_r($oCustomer);
// print_r($bResult);
// echo "</pre>";

?>