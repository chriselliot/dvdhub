<?php
require_once ('db-wrapper.php');

class Dvd {

	private $iProductID;
	private $sProductName;
	private $sDirector;
	private $sDescription; 
	private $iPrice; 
	private $iTypeID; 
	private $sPhotoPath; 
	private $iActive; 
	private $sTrailerLink; 


	public function __construct(){

		$this->iProductID = 0;
		$this->sProductName = "";
		$this->sDirector = "";
		$this->sDescription = "";
		$this->iPrice = 0;
		$this->iTypeID = 0;
		$this->sPhotoPath = "";
		$this->iActive = 0;
		$this->sTrailerLink = "";

	}
	

	public function load($iProductID){

		$oDatabase = new Database();
		$sQuery = "SELECT ProductID, ProductName, Director, Description, Price, TypeID, PhotoPath, Active, TrailerLink FROM tbproduct WHERE ProductID = " .$iProductID;

		$oResult = $oDatabase->query($sQuery);
		$aDvdInfo = $oDatabase->fetch_array($oResult);

		$this->iProductID = $aDvdInfo['ProductID'];
		$this->sProductName = $aDvdInfo['ProductName'];
		$this->sDirector = $aDvdInfo['Director'];
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

		if($this->iProductID == 0){
		
			$sQuery = "INSERT INTO tbproduct (ProductName, Director, Description, Price, TypeID, PhotoPath, Active, TrailerLink)
					VALUES ('".$oDatabase->escape_value($this->sProductName)."', 
							'".$oDatabase->escape_value($this->sDirector)."', 
							'".$oDatabase->escape_value($this->sDescription)."',
							'".$oDatabase->escape_value($this->iPrice)."', 
							'".$oDatabase->escape_value($this->iTypeID)."', 
							'".$oDatabase->escape_value($this->sPhotoPath)."',
							'".$oDatabase->escape_value($this->iActive)."',
							'".$oDatabase->escape_value($this->sTrailerLink)."')";
			
			$oResult = $oDatabase->query($sQuery);

		if($oResult == true){
			$this->iProductID = $oDatabase->get_insert_id();
		}else{
			die($sQuery . " is invalid.");
		}	

		}else{
			$sQuery = "UPDATE tbproduct 
						SET ProductName = '".$oDatabase->escape_value($this->sProductName)."',
							Director = '".$oDatabase->escape_value($this->sDirector)."',
							Description = '".$oDatabase->escape_value($this->sDescription)."',
							Price = '".$oDatabase->escape_value($this->iPrice)."',
							TypeID = '".$oDatabase->escape_value($this->iTypeID)."'
							PhotoPath = '".$oDatabase->escape_value($this->sPhotoPath)."'
							Active = '".$oDatabase->escape_value($this->iActive)."'
							TrailerLink = '".$oDatabase->escape_value($this->sTrailerLink)."'
						WHERE ProductID = ".$oDatabase->escape_value($this->iProductID);
						

			$oResult = $oDatabase->query($sQuery);
			if($oResult == false){
				die($sQuery . " is invalid.");
			}
		}

	$oDatabase->close();

	}

	public function __get($sProperty){
		switch ($sProperty){
			case "productID":
				return $this->iProductID;
				break;
			case "title":
				return $this->sProductName;
				break;
			case "director":
				return $this->sDirector;
				break;
			case "sypnosis":
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

	public function __set($sProperty,$value){

		switch ($sProperty) {
			case 'title':
				$this->sProductName = $value;
				break;
			case 'director':
				$this->sDirector = $value;
				break;
			case 'sypnosis':
				$this->sDescription = $value;
				break;
			case 'price':
				$this->iPrice = $value;
				break;
			case 'typeID':
				$this->iTypeID = $value;
				break;
			case 'photoPath':
				$this->sPhotoPath = $value;
				break;
			case 'active':
				$this->iActive = $value;
				break;	
			case 'trailer':
			$this->sTrailerLink = $value;
			break;		
			default:
				die($sProperty . " is unable to be written to");
		}
	}

	


}

?>