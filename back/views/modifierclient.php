<HTML>
<head>
</head>
<body>
<?php
include "../core/clientC.php";
if (isset($_GET['nom'])){
	$clientC=new clientC();
    $result=$clientC->recupererClient($_GET['nom']);
	foreach($result as $row){
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$age=$row['age'];
		$num=$row['num'];
		$email=$row['email'];
		$mdp=$row['mdp'];
?>
<form method="POST">
<table>
<caption>Modifier Employe</caption>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>Prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>Age</td>
<td><input type="text" name="age" value="<?PHP echo $age ?>"></td>
</tr>
<tr>
<td>Num</td>
<td><input type="text" name="num" value="<?PHP echo $num ?>"></td>
</tr>
<tr>
<td>E-mail</td>
<td><input type="text" name="email" value="<?PHP echo $email ?>"></td>
</tr>
<tr>
<td>Mot De Passe</td>
<td><input type="text" name="mdp" value="<?PHP echo $mdp ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="hidden" name="nom" value="<?PHP echo $_GET['nom'];?>"></td>
</tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$client=new client($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['num'],$_POST['email'],$_POST['mdp']);
	$clientC->modifierClient($client,$_POST['nom']);
	echo $_POST['nom'];
	header('Location: GestionClient.php');
}
?>
</body>
</HTMl>