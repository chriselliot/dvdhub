<?php

class Cart{

	private $aContents;

	public function __construct(){

		$this->aContents = array();

	}


	public function add($iProductID, $iQuantity){

		if(isset($this->aContents[$iProductID]) == true){
			$this->aContents[$iProductID] += $iQuantity;
		}else{
			$this->aContents[$iProductID] = $iQuantity;
		}

	}

	public function remove($iProductID, $iQuantity){

		$this->aContents[$iProductID] -= $iQuantity;
		if($this->aContents[$iProductID] <= 0){
			unset($this->aContents[$iProductID]);
		}
	}

	public function __get($sProperty){

		switch($sProperty){
			case "productID":
				return $this->iProductID;
				break;
			default:
				die($sProperty . " cannot be read from");
		}
	}

}


//TESTING

$oCart = new Cart();
$oCart->add("12", 2);
$oCart->add("18", 5);

echo "<pre>";
print_r($oCart);
echo "</pre>";
?>