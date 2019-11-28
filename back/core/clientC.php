<?php
include ("../config.php");
include ("../entities/client.php");
class clientC
{
	function ajouterClient($client)
	{
       $sql = "INSERT INTO client (nom,prenom,age,num,email,mdp) values (:nom,:prenom,:age,:num,:email,:mdp)";//requete sql
        $db= config::getConnexion();
        try {

        	$nom=$client->getNom();
            $prenom=$client->getPrenom(); 
            $age=$client->getAge();
            $num=$client->getNum();
        	$email=$client->getEmail();
        	$mdp=$client->getMdp();
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $nom);
            $req->bindValue(':prenom', $prenom);
            $req->bindValue(':age', $age);
            $req->bindValue(':num', $num);
            $req->bindValue(':email', $email);
            $req->bindValue(':mdp', $mdp);
           
            $req->execute();
        } catch (Exception $e) {
            echo 'erreur: ' . $e->getMessage();
        }
	}
    function afficher_return()
        {
            $config=new config();
            $instance=$config->getConnexion();

           $response=$instance->query('SELECT * FROM client');
            return $response;
        }
        function supprimerClient($nom)
    {
        $sql="DELETE FROM client where nom= :nom";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierClient($client,$nom_a)
{
        $sql="UPDATE client SET nom=:nom, prenom=:prenom, age=:age, num=:num, email=:email , mdp=:mdp WHERE nom=:nom_a";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
        $req=$db->prepare($sql);
        $nom=$client->getNom();
        $prenom=$client->getPrenom();
        $age=$client->getAge();
        $num=$client->getNum();
        $email=$client->getEmail();
        $mdp=$client->getMdp();
        $datas = array(':nom'=>$nom, ':prenom'=>$prenom, ':age'=>$age,':num'=>$num, 'email'=>$email, 'mdp'=>$mdp);
        $req->bindValue(':nom_a',$nom_a);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prenom',$prenom);
        $req->bindValue(':age',$age);
        $req->bindValue(':num',$num);
        $req->bindValue(':email',$email);
        $req->bindValue(':mdp',$mdp);
        
        
            $s=$req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
    function recupererClient($nom){
        $sql="SELECT * from client where nom=$nom";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>