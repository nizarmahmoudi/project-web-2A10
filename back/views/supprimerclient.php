<?PHP
include ("../core/clientC.php");
$clientC=new clientC();
if (isset($_POST["nom"])){
	$clientC->supprimerClient($_POST["nom"]);
	header('Location:GestionClient.php');
}
else{
	echo "menich mfasakh";
}

?>