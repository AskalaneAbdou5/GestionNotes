<?php 

function Supprime_une_classe(){
    if(isset($_GET['id_del_classe'])){
        $connect=connection_bdd();
        $get=$_GET['id_del_classe'];

        $sql = "DELETE FROM classes WHERE Id=$get ";
        $stmt = $connect->prepare($sql);
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Cette classe est associer à des eleves , veuillez d\'abord supprimer les eleves.';
            echo "<button><a href='classes.php'>Retour</a></button>";
            exit;
        }

        
    }
}




function Supprime_un_eleve(){
    if(isset($_GET['id_del_eleve'])){
        $connect=connection_bdd();
        $get=$_GET['id_del_eleve'];

        $sql = "DELETE FROM eleves WHERE Id=$get ";
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }
}




function Supprime_une_matiere(){
    if(isset($_GET['id_del_matiere'])){
        $connect=connection_bdd();
        $del_matiere=$_GET['id_del_matiere'];

        $sql = "DELETE FROM matieres WHERE Id=$del_matiere ";
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }
}


function Supprime_une_note(){
    if(isset($_GET['id_del_note'])){
        $connect=connection_bdd();
        $del_note=$_GET['id_del_note'];

        $sql = "DELETE FROM notes WHERE Id=$del_note ";
        $stmt = $connect->prepare($sql);
        return $stmt->execute();
    }
}
?>