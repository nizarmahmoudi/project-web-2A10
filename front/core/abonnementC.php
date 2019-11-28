<?php
include ("../config.php");
include ("../entities/abonnement.php");
class abonnementC
{
	function ajouterAbonnement($abonnement)
	{
       $sql = "INSERT INTO abonnement(nom,prenom,age,dateD,dateF)values(:nom,:prenom,:age,:dateD,:dateF)";//requete sql
        $db= config::getConnexion();
        try {

        	$nom=$abonnement->getNom();
            $prenom=$abonnement->getPrenom(); 
            $age=$abonnement->getAge();
            $dateD=$abonnement->getDateD();
        	$dateF=$abonnement->getDateF();
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':age', $age);
            $req->bindValue(':dateD', $dateD);
            $req->bindValue(':dateF', $dateF);
           
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
}
?>