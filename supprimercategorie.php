<?PHP
include "../core/categorieC.php";
$categorieC=new categorieC();
if (isset($_POST["idC"])){
	$categorieC->supprimercategorie($_POST["idC"]);
	header('Location: affichercategorie.php');
}

?>