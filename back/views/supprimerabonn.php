<?PHP
include ("../core/abonnementC.php");
$abonnementC=new abonnementC();
if (isset($_POST["nom"])){
	$abonnementC->supprimerAbonnement($_POST["nom"]);
	header('Location:GestionAbonnement.php');
}
else{
	echo "menich mfasakh";
}

?>