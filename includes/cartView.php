<?php

class cartView {

	public function render ($oCart){

		$aContents = $oCart->contents;
		$fGrandTotal = 0;

		$sHTML = "";
		$sHTML = '<h1>My Cart</h1>
				<div id="cart-headings">
				    <h3 id="first-heading">Product:</h3>
				    <h3>Quantity:</h3>
				    <h3>Unit Price:</h3>
				    <h3>Total Price:</h3>
				    <h3>Remove:</h3>
				</div>';

		foreach($aContents as $key=>$value){
				
				$oDvd = new Dvd();
				$oDvd->load($key);
				$fSubTotal = $value * $oDvd->price;

				$sHTML .= '<div class="cart-line">
				    <div class="product-cell">'.$oDvd->title.'</div>
				    <div class="cell">'.$value.'</div>
				    <div class="cell">'.number_format($oDvd->price,2).'</div>
				    <div class="cell" id="total">'.number_format($fSubTotal,2).'</div>
				    <div class="cell"><a href="">Remove</a></div>
				</div>';

				$fGrandTotal += $fSubTotal;
		}

		$sHTML .= '<div id="grandtotal">GRAND TOTAL - <span>$'.number_format($fGrandTotal,2).'</span></div>';

		return $sHTML;
	}
}

?>