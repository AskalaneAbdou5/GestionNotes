<?php 

function Modifie_une_classe(){
    if(isset($_GET['classe_updated']) && isset($_GET['id_update'])){
        $connect=connection_bdd();
        $nom_classe=$_GET['classe_updated'];
        $id_classe=$_GET['id_update'];

        $sqlb = "UPDATE classes SET Nom_Classe = '$nom_classe' WHERE Id = '$id_classe'";
        $stmt = $connect->prepare($sqlb);
        return $stmt->execute();
    }
}



function Modifie_un_eleve(){
    if(isset($_GET['nom_updated']) && isset($_GET['prenom_updated']) && isset($_GET['id_classe_updated']) && isset($_GET['id_eleve_updated'])){
        $connect=connection_bdd();
        $nom=$_GET['nom_updated'];
        $prenom=$_GET['prenom_updated'];
        $id_classe=$_GET['id_classe_updated'];
        $id_eleve=$_GET['id_eleve_updated'];

        $sqlb = "UPDATE eleves SET Nom = '$nom', Prenom = '$prenom', Id_Classe = '$id_classe' WHERE Id = '$id_eleve'";
        $stmt = $connect->prepare($sqlb);
        return $stmt->execute();
    }
}

function Modifie_une_matiere(){
    if(isset($_GET['matiere_updated']) && isset($_GET['id_matiere_updated'])){
        $connect=connection_bdd();
        $nom_matiere=$_GET['matiere_updated'];
        $id_matiere=$_GET['id_matiere_updated'];

        $sqlb = "UPDATE matieres SET Nom_Matiere = '$nom_matiere' WHERE Id = '$id_matiere'";
        $stmt = $connect->prepare($sqlb);
        return $stmt->execute();
    }
}


function Modifie_une_note(){
    if(isset($_GET['id_note_updated']) && isset($_GET['date_updated']) && isset($_GET['note_updated']) && isset($_GET['id_matiere_updated']) && isset($_GET['id_eleve_updated'])){
        $connect=connection_bdd();
        $id_note=$_GET['id_note_updated'];
        $date=$_GET['date_updated'];
        $note=$_GET['note_updated'];
        $id_matiere=$_GET['id_matiere_updated'];
        $id_eleve=$_GET['id_eleve_updated'];

        $sqlb = "UPDATE notes SET Note = '$note', Date = '$date', Id_Eleve = '$id_eleve', Id_Matiere = '$id_matiere' WHERE Id = '$id_note'";
        $stmt = $connect->prepare($sqlb);
        return $stmt->execute();
    }
}
?>