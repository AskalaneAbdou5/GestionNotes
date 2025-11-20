<?php

function Ajoute_une_classe(){
    if(isset($_POST['classe'])){
        $connect=connection_bdd();
        $post=trim(strip_tags($_POST['classe']));

        if (!empty($post)) {
            $sql = "INSERT INTO classes(Nom_Classe) VALUES(:nom_classe)";
            $stmt = $connect->prepare($sql);
            return $stmt->execute([
                "nom_classe" => $post
            ]);
        }
        else {
            echo "<script type='text/javascript'>alert('Veuiller mettre une classe')</script>";
        }
        
    }
}


function Ajoute_un_eleve(){
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['id_classe'])){
        $connect=connection_bdd();
        $nom=trim(strip_tags($_POST['nom']));
        $prenom=trim(strip_tags($_POST['prenom']));
        $id_classe=trim(strip_tags($_POST['id_classe']));
        

        if (!empty($nom) && !empty($prenom)) {
            $sql = "INSERT INTO eleves(Nom,Prenom,Id_Classe) VALUES(:nom,:prenom,:id_classe)";
            $stmt = $connect->prepare($sql);
            return $stmt->execute([
                "nom" => $nom,
                "prenom" => $prenom,
                "id_classe" => $id_classe
            ]);
        }
        else {
            echo "<script type='text/javascript'>alert('Veuiller remplir les champs')</script>";
        }
        
    }
}




function Ajoute_une_matiere(){
    if(isset($_POST['matiere'])){
        $connect=connection_bdd();
        $ajout_matiere=trim(strip_tags($_POST['matiere']));

        if (!empty($ajout_matiere)) {
            $sql = "INSERT INTO matieres(Nom_Matiere) VALUES(:ajout_matiere)";
            $stmt = $connect->prepare($sql);
            return $stmt->execute([
                "ajout_matiere" => $ajout_matiere
            ]);
        }
        else {
            echo "<script type='text/javascript'>alert('Veuiller mettre une matière')</script>";
        }
        
    }
}


function Ajoute_une_note(){
    if(isset($_POST['note']) && isset($_POST['date']) && isset($_POST['eleve']) && isset($_POST['matiere'])){
        $connect=connection_bdd();
        $note=$_POST['note'];
        $date=$_POST['date'];
        $id_eleve=$_POST['eleve'];
        $id_matiere=$_POST['matiere'];

        if (!empty($note) && !empty($date)) {
            $sql = "INSERT INTO notes(Note,Date,Id_Eleve,Id_Matiere) VALUES(:note,:date,:id_eleve,:id_matiere)";
            $stmt = $connect->prepare($sql);
            return $stmt->execute([
                "note" => $note,
                "date" => $date,
                "id_eleve" => $id_eleve,
                "id_matiere" => $id_matiere
            ]);
        }
        else {
            echo "<script type='text/javascript'>alert('Veuiller remplir les champs')</script>";
        }
        
    }
}
?>