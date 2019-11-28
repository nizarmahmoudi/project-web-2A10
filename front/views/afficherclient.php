
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title></title>
</head>
<body>
	<?php

include('../core/filmC.php');
$filmC= new filmC();
$listefilm=$filmC->afficher_return();
?>

<form name="form" method="POST" action="supprimer.php">
<table border="1">
	<tr>
		<td>ref</td>
		<td>titre</td>
		<td>description</td>
		<td>type</td>
	    <td>date projection</td>
	    <td>supprimer</td>
	
	</tr>
	<?php
	while ($donne=$listefilm->fetch())
	{
	?>

    <tr>
    	<td><?php echo $donne['ref'];?></td>
    	<td><?php echo $donne['titre'];?></td>
    	<td><?php echo $donne['description'];?></td>
    	<td><?php echo $donne['type'];?></td>
    	<td><?php echo $donne['dateProjection'];?></td>
    	<td><input type="submit" name="supprimer" value="supprimer"></td>
    	
    </tr>
  
    <?php 	
	}
	?>
</table>
</form>
</body>
</html>