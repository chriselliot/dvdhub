<?php

class MenuView {

  public function render($aGenre){
    $sHTML = '';
    $sHTML .= '<ul id="categories">';
    $sHTML .= '<li id="nav-title">Categories</li>';

    for ($iCount=0; $iCount<count($aGenre) ;$iCount++) {

        $oCurrentGenre = $aGenre[$iCount];
        $sHTML .=  '<li><a href="category.php">' . $oCurrentGenre->typeName .'</a></li>';
        
    }

    $sHTML .= '<li id="free"></li>';
    $sHTML .= '</ul>';
    return $sHTML;

  }

}

?>