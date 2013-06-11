<?php
require_once ('db-wrapper.php');

class Dvd {

	private $iProductID;
	private $sProductName;
	private $sDescription; 
	private $iPrice; 
	private $iTypeID; 
	private $sPhotoPath; 
	private $iActive; 
	private $sTrailerLink; 


	public function __construct(){

		$this->iProductID = 0;
		$this->sProductName = "";
		$this->sDescription = "";
		$this->iPrice = 0;
		$this->iTypeID = 0;
		$this->sPhotoPath = "";
		$this->iActive = 0;
		$this->sTrailerLink = "";

	}
	

	public function load($iProductID){

		$oDatabase = new Database();
		$sQuery = "SELECT ProductID, ProductName, Description, Price, TypeID, PhotoPath, Active, TrailerLink FROM tbproduct WHERE ProductID = " .$iProductID;

		$oResult = $oDatabase->query($sQuery);
		$aDvdInfo = $oDatabase->fetch_array($oResult);

		$this->iProductID = $aDvdInfo['ProductID'];
		$this->sProductName = $aDvdInfo['ProductName'];
		$this->sDescription = $aDvdInfo['Description'];
		$this->iPrice = $aDvdInfo['Price'];
		$this->iTypeID = $aDvdInfo['TypeID'];
		$this->sPhotoPath = $aDvdInfo['PhotoPath'];
		$this->iActive = $aDvdInfo['Active'];
		$this->sTrailerLink = $aDvdInfo['TrailerLink'];

		$oDatabase->close();
	}



	public function save(){

		$oDatabase = new Database();
		$oDatabase->close();

	}

	public function __get($sProperty){
		switch ($sProperty){
			case "productID":
				return $this->iProductID;
				break;
			case "productName":
				return $this->sProductName;
				break;
			case "description":
				return $this->sDescription;
				break;
			case "price":
				return $this->iPrice;
				break;
			case "typeID":
				return $this->iTypeID;
				break;
			case "photoPath":
				return $this->sPhotoPath;
				break;
			case "active":
				return $this->iActive;
				break;
			case "trailer":
				return $this->sTrailerLink;
				break;
			default:
				die($sProperty . " cannot be read from.");
		}
	}

}
/*
$oDvd = new Dvd();
$oDvd->load(1);

echo "<pre>";
print_r($oDvd);
echo "</pre>";
*/
?>