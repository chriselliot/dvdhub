<?php

class Form {

	private $sHTML;
	private $aData;
	private $aErrors;

	public function __construct(){

		$this->sHTML = '<form action="" method="post">';
		$this->aData = array();
		$this->aErrors = array();

	}

	public function makeInput($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <input type="text" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'"/>
			<div class="message">'.$sError.'</div><div class="clear"></div>';

	}

	public function makeTextArea($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <div class="message">'.$sError.'</div><textarea rows="4" cols="42" name="'.$sControlName.'" id="'.$sControlName.'">'.$sData.'</textarea>
			<div class="clear"></div>';
		
	}

	public function makePass($sControlName,$sLabel){

		$sData = "";
		if(isset($this->aData[$sControlName])){ 
			$sData = $this->aData[$sControlName];
		}

		$sError = "";
		if(isset($this->aErrors[$sControlName])){
			$sError = $this->aErrors[$sControlName];
		}

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <input type="password" name="'.$sControlName.'" id="'.$sControlName.'" value="'.$sData.'"/>
			<div class="message">'.$sError.'</div><div class="clear"></div>';

	}


	public function makeSubmit($sControlName,$sLabel){

		$this->sHTML .= '<input name="'.$sControlName.'" id="'.$sControlName.'" type="submit" value="'.$sLabel.'" />
						<div class="clear"></div>';	
	}


	public function checkRequired($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]); 
		}

		if(strlen($sData)==0){
			$this->aErrors[$sControlName] = "Required field"; 
		}

	}

	//wont check if data is not availale

	public function checkEmail($sControlName){

		$sData = "";

		if(isset($this->aData[$sControlName])){
			$sData = trim($this->aData[$sControlName]); 
		}

		if(strlen($sData)==0){
			$this->aErrors[$sControlName] = "Required field"; 
		}else{

			if(filter_var($sData, FILTER_VALIDATE_EMAIL) == false){
				$this->aErrors[$sControlName] = "Email is invalid"; 
			}
		}	

	}

	public function raiseCustomError($sControlName,$sErrorMessage) {

		$this->aErrors[$sControlName] = $sErrorMessage;
		
	}


	public function __get($sProperty){

		switch ($sProperty) {

			case 'html':
				return $this->sHTML . "</form>";
				break;
			case 'valid':
				if(count($this->aErrors)==0){
					return true;
				}else{
					return false;
				}
				break;
			default:
				die($sProperty . " is restricted");
		}
	}


	public function __set($sProperty,$value){

		switch ($sProperty) {
			case 'data':
				$this->aData = $value;
				break;	
			default:
				die($sProperty . " is unable to be written to");
		}
	}

}