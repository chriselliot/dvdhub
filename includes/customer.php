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


	public function __construct(){

		$this->iCustomerID = 0;
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sAddress = "";
		$this->sTelephone = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->sPassword = "";

	}

	public function load($iCustomerID){

		$oDatabase = new Database();

		$sQuery = "SELECT CustomerID, FirstName, LastName, Address, Telephone, Email, UserName, Password FROM tbcustomer WHERE CustomerID='".$iCustomerID."'";

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

		$oDatabase->close();
	}

	public function loadByUserName($sUserName){

		$oDatabase = new Database();

		$sQuery = "SELECT CustomerID, UserName FROM tbcustomer WHERE UserName ='".$sUserName."'";
		$oResult = $oDatabase->query($sQuery);
		$aCustomer = $oDatabase->fetch_array($oResult);

		$this->iCustomerID = $aCustomer["CustomerID"];
		$this->sUserName = $aCustomer["UserName"];
		
		/*if (){
			return false
		}else {
			return true
		}*/

		$oDatabase->close();
	}

	public function save(){

		$oDatabase = new Database();

		if($this->iCustomerID == 0){
		
		$sQuery = "INSERT INTO tbcustomer (FirstName, LastName, Address, Telephone, Email, UserName, Password)
				VALUES ('".$this->sFirstName."', '".$this->sLastName."', '".$this->sAddress."','".$this->sTelephone."', '".$this->sEmail."', '".$this->sUserName."', '".$this->sPassword."')";
		
		$oResult = $oDatabase->query($sQuery);

		}else{
			die($sQuery . " is invalid.");
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

$oCustomer = new Customer();
$oCustomer->loadByUserName('chris');


echo "<pre>";
print_r($oCustomer);
echo "</pre>";

?>