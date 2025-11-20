<?php 
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$id_classe=$_GET['id_classe'];
$id_eleve=$_GET['id_eleve'];


?>

   <form action="eleves.php" method="get">
        <label for="prenom">Prénom </label>
        <input type="text" name="prenom_updated" value="<?php echo $prenom;?>">

        <label for="nom">Nom </label>
        <input type="text" name="nom_updated" value="<?php echo $nom;?>">
        <input type="hidden" name="id_eleve_updated" value="<?php echo $id_eleve;?>">

        <label for="classe">Classe</label>

        <select name="id_classe_updated" >

        <?php foreach ($classes as $classe) { ?>
            <?php if ($classe['Id'] === intval($id_classe)) { ?>

            <option value="<?php echo $classe['Id'];?>" selected><?php echo $classe['Nom_Classe']?></option>

            <?php } else { ?>
                <option value="<?php echo $classe['Id'];?>"><?php echo $classe['Nom_Classe']?></option>
            <?php } ?>
        <?php } ?>
        
        </select>

        <input type="submit" value="Modifier">
    </form>
