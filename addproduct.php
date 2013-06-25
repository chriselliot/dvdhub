<?php
require_once("includes/head.php");
require_once("includes/form.php");
require_once("includes/dvd.php");
require_once("includes/genreManager.php");

$oForm = new Form();

if(isset($_POST["submit"])){

    $oForm->data = $_POST;
    $oForm->files = $_FILES;

    $oForm->checkRequired("title");
    $oForm->checkRequired("director");
    $oForm->checkRequired("sypnosis");
    $oForm->checkRequired("price");
    $oForm->checkRequired("genre");
    $oForm->checkRequired("active");
    $oForm->checkRequired("trailer");

    $oForm->checkImageUpload("photoPath");

    if($oForm->valid==true){

            $sNewName ="images/".strtolower(preg_replace('/[\s\W]+/','',$_POST["title"])).".jpg";
            $oForm->moveFile("photoPath",$sNewName);

            $oDvd = new Dvd();
            $oDvd->title = $_POST["title"];
            $oDvd->director = $_POST["director"];
            $oDvd->sypnosis = $_POST["sypnosis"];
            $oDvd->price = $_POST["price"];
            $oDvd->typeID = $_POST["genre"];
            $oDvd->photoPath = $sNewName;
            $oDvd->active = $_POST["active"];
            $oDvd->trailer = $_POST["trailer"];
            $oDvd->save();

            header("Location:category.php?typeID=".$oDvd->typeID); 
            exit;
    }

} 


$oGM = new GenreManager();
$aGenreObjects = $oGM->getAllGenre();

$aGenres = array();

for($iCount=0;$iCount<count($aGenreObjects);$iCount++){
    $oGenre = $aGenreObjects[$iCount];
    $aGenres[$oGenre->typeID]=$oGenre->typeName;
}


$aActive = array();
$aActive[1] = "Active";
$aActive[2] = "Inactive";

$oForm->makeInput("title","Movie Title (year)");
$oForm->makeInput("director","Director");
$oForm->makeSelect("genre", "Genre", $aGenres);
$oForm->makeTextArea("sypnosis","Sypnosis");
$oForm->makeInput("price","Price");
$oForm->makeFileUpload("photoPath", "Sleeve Artwork");
$oForm->makeInput("trailer", "Link to Trailer");
$oForm->makeSelect("active", "Activation", $aActive);
$oForm->makeSubmit("submit", "Add");

?>
    
    <h1>Upload DVDs to <span>DVD HUB</span></h1>

	<div id="update">
    <?php 
    //echo"<pre>";
    //print_r($aGenres);
    //echo "</pre>"; 
    echo $oForm->html; ?>
    </div>

<?php
require_once("includes/foot.php");
?>