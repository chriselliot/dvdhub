<?php
require_once("includes/head.php");
require_once('includes/genreView.php');
require_once('includes/genre.php');

      
  $oGV = new GenreView();
  
  $iTypeID = 2;

  if(isset($_GET['typeID'])){
  	$iTypeID = $_GET['typeID'];
  }
 
  $oCurrentGenre = new Genre(); 
  $oCurrentGenre->load($iTypeID);


  echo $oGV->render($oCurrentGenre);



require_once("includes/foot.php");

?>