<?php
require_once ('db-wrapper.php');
require_once ('genre.php');

class GenreManager {

	public function getAllGenre(){

		$oDatabase = new Database();

		$sQuery = "SELECT TypeID FROM tbproducttype";
		$oResult = $oDatabase->query($sQuery);

		$aGenre = array();

		while ($aRows = $oDatabase->fetch_array($oResult)) {

			$oGenre = new Genre();
			$oGenre->load($aRows["TypeID"]);
			$aGenre[] = $oGenre;
		}

		$oDatabase->close();

		return $aGenre;
	}
}

$oGenreMan = new GenreManager();
$aAllGenre = $oGenreMan->getAllGenre();

echo "<pre>";
print_r($aAllGenre);
echo "</pre>";

?>