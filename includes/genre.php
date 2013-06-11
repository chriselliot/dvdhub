<?php
require_once ('db-wrapper.php');
require_once ('dvd.php');

class Genre {

	private $iTypeID;
	private $sTypeName;
	private $sDescription;
	private $iDisplayOrder;
	private $aDvd;

	public function __construct(){

		$this->iTypeID = 0;
		$this->sTypeName = "";
		$this->sDescription = "";
		$this->iDisplayOrder = 0;
		$this->aDvd = array();

	}

	public function load($iTypeID){

		$oDatabase = new Database();

		$sQuery = "SELECT TypeID, TypeName, Description, DisplayOrder FROM tbproducttype WHERE TypeID = " .$iTypeID;

		$oResult = $oDatabase->query($sQuery);
		$aGenreInfo = $oDatabase->fetch_array($oResult);

		$this->iTypeID = $aGenreInfo['TypeID'];
		$this->sTypeName = $aGenreInfo['TypeName'];
		$this->sDescription = $aGenreInfo['Description'];
		$this->iDisplayOrder = $aGenreInfo['DisplayOrder'];

		$sQuery = "SELECT ProductID FROM tbproduct WHERE TypeID = ". $iTypeID;
		$oResult = $oDatabase->query($sQuery);

		while($aRow = $oDatabase->fetch_array($oResult)){

			$oDvd = new Dvd();
			$oDvd->load($aRow["ProductID"]);
			$this->aDvd[] = $oDvd;

		}

		$oDatabase -> close();
	}

	public function __get($sProperty){
		switch ($sProperty){
			case "typeID":
				return $this->iTypeID;
				break;
			case "typeName":
				return $this->sTypeName;
				break;
			case "description":
				return $this->sDescription;
				break;
			case "displayOrder":
				return $this->iDisplayOrder;
				break;
			default:
				die($sProperty . " cannot be read from.");
		}
	}

}
/*
$oGenre = new Genre();
$oGenre->load(5);

echo "<pre>";
print_r($oGenre);
echo "</pre>";
*/
?>