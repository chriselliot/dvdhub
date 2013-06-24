<?php
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/dvd.php");

$oForm = new Form();

if(isset($_POST["submit"])){

    $oForm->data = $_POST;  
    $oForm->checkRequired("title");
    $oForm->checkRequired("director");
    $oForm->checkRequired("sypnosis");
    $oForm->checkRequired("price");
    $oForm->checkRequired("genre");
    $oForm->checkRequired("photoPath");
    $oForm->checkRequired("active");
    $oForm->checkRequired("trailer");
       

    if($oForm->valid==true){

            $oDvd = new Dvd();
            $oDvd->title = $_POST["title"];
            $oDvd->director = $_POST["director"];
            $oDvd->sypnosis = $_POST["sypnosis"];
            $oDvd->price = $_POST["price"];
            $oDvd->typeID = $_POST["genre"];
            $oDvd->photoPath = $_POST["photoPath"];
            $oDvd->active = $_POST["active"];
            $oDvd->trailer = $_POST["trailer"];
            $oDvd->save();

            header("Location:category.php?typeID=".$oDvd->typeID); 
            exit;
    }

} 

$aGenres = array();
$aGenres[1] = "Comedy";
$aGenres[2] = "Action";
$aGenres[3] = "Sci-fi";
$aGenres[4] = "Thriller";
$aGenres[5] = "Horror";
$aGenres[6] = "Drama";
$aGenres[7] = "Kids";

$aActive = array();
$aActive[1] = "Active";
$aActive[2] = "Inactive";

$oForm->makeInput("title","Movie Title (year)");
$oForm->makeInput("director","Director");
$oForm->makeSelect("genre", "Genre",$aGenres);
$oForm->makeTextArea("sypnosis","Sypnosis");
$oForm->makeInput("price","Price");
$oForm->makeInput("photoPath", "Sleeve Artwork");
$oForm->makeInput("trailer", "Link to Trailer");
$oForm->makeSelect("active", "Activation",$aActive);
$oForm->makeSubmit("submit", "Add");

?>
    
    <h1>Upload DVDs to <span>DVD HUB</span></h1>

	<div id="update"><?php echo $oForm->html; ?></div>

<?php
//echo "<pre>";
//print_r($oDvd);
//echo "</pre>";
require_once("includes/foot.php");
?>