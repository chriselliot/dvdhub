<?php

class GenreView {


	public function render($oGenre){
		
		$aDvds = $oGenre->dvds;

		$sHTML = "";
		$sHTML = '<h1>New Release <span>'.htmlentities($oGenre->typeName).'</span> DVDs</h1>';

		for ($i=0;$i<count($aDvds);$i++) { 
		          
		        $oCurrentDvd = $aDvds[$i];

				$sHTML .='<div class="product">';

		        $sHTML .= '<img src="assets/'.htmlentities($oCurrentDvd->photoPath).'" height="183" width="135" alt="dvd cover"></img>
								<div class="title"><span>Title:</span><h3>'.htmlentities($oCurrentDvd->title).'</h3></div>
								<div class="director"><span>Director:</span>'.htmlentities($oCurrentDvd->director).'</div>
								<div class="sypnosis"><span>Sypnosis:</span><p>'.htmlentities($oCurrentDvd->sypnosis).'</p></div>
								<div class="price">
									<span>Price:</span>
									<h3>$'.htmlentities(number_format($oCurrentDvd->price,2)).'</h3>
									<a href="addtocart.php?productID='.htmlentities($oCurrentDvd->productID).'" class="cart-button">add to cart</a>
									<a href="'.htmlentities($oCurrentDvd->trailer).'" class="trailer-button">watch trailer</a>
								</div>';
				$sHTML .=	'</div>';
		    }
					
		return $sHTML;

	}

}	

?>



