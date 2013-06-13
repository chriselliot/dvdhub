<?php

class Form {

	private $sHTML;

	public function __construct(){

		$this->sHTML = '<form action="" method="post">';

	}

	public function makeInput($sControlName,$sLabel){

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <input type="text" name="'.$sControlName.'" id="'.$sControlName.'" value=""/>
			<div class="message"></div><div class="clear"></div>';

	}

	public function makeTextArea($sControlName,$sLabel){

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <div class="message"></div><textarea rows="4" cols="42" name="'.$sControlName.'" id="'.$sControlName.'"></textarea>
			<div class="clear"></div>';
		
	}

	public function makePass($sControlName,$sLabel){

		$this->sHTML .= '
			<label for="'.$sControlName.'">'.$sLabel.':</label>
            <input type="password" name="'.$sControlName.'" id="'.$sControlName.'" value=""/>
			<div class="message"></div><div class="clear"></div>';

	}

	public function makeSubmit($sControlName,$sLabel){

		$this->sHTML .= '<input name="'.$sControlName.'" id="'.$sControlName.'" type="submit" value="'.$sLabel.'" />
						<div class="clear"></div>';	
	}


	public function __get($sProperty){

		switch ($sProperty) {

			case 'html':
				return $this->sHTML . "</form>";
				break;
			default:
				die($sProperty . " is restricted");
		}
	}

}