<?php
include ("../core/abonnementC.php");


if(isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['age']) and isset($_POST['dateD']) and isset($_POST['dateF']));
{
	$abonnement= new abonnement($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['dateD'],$_POST['dateF']);
	$abonnementC=new abonnementC();
	$abonnementC->ajouterAbonnement($abonnement);
	//header('Location:afficher.php');
}
 //else
//{echo"verifier les champs";}
?>