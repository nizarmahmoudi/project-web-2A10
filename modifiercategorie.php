<?PHP
include "../entities/categorie.php";
include "../core/categorieC.php";
if (isset($_GET['idC'])){
  $categorieC=new categorieC();
    $result=$categorieC->recuperercategorie($_GET['idC']);
  foreach($result as $row){
    $idC=$row['idC'];
    $nomC=$row['nomC'];
    $famille=$row['Famille'];
?>
<form method="POST">
                                         <div class="form-group">
                                            <label for="card-number" class="form-label">Identifiant *</label>
                                            <input class="form-control" type="number" name="idC" placeholder="id catégorie" value="<?PHP echo $idC ?>" id ='idC'onkeyup="verifier()" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Nom *</label>
                                            <input class="form-control" type="text" name="nomC" placeholder="nom catégorie" value="<?PHP echo $nomC ?>" onkeyup="lettersOnly(this)" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="card-number" class="form-label">Famille *</label>
                                            <input class="form-control" type="text" name="famille" placeholder="Famille catégorie" value="<?PHP echo $famille ?>" onkeyup=" lettersOnly(this)"  required class="form-control">
                                        </div>
                                        <div id="verif" class="alert alert-danger" role="alert" hidden>les valeurs negatives ne sont pas acceptables!
                                            </div>
                                        
                                        
                                        



<td><input type="submit" name="modifier" value="Modifier Categorie!"></td>

</form>
<?PHP
  }

if (isset($_POST['modifier'])){
  $categorie=new categorie($_POST['idC'],$_POST['nomC'],$_POST['famille']);
  $categorieC->modifiercategorie($categorie,$_POST['idC']);
  header('Location: Affichercategorie.php');
  
}
}

?>