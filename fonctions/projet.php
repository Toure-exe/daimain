<?php
function inscription() {
    global $bdd;
    
    extract($_POST);
    
    $validation = true;
    $erreur = [];
    
    if(empty($statut) || empty($nom) || empty($prenom) || empty($email) || empty($contact) || empty($adresse) || empty($fonction) || empty($origine) || empty($duree) || empty($accroche) || empty($plan) || empty($budget) || empty($equipe)) {
        $validation = false;
        $erreur[] = "Tous les champs sont obligatoires";
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation = false;
        $erreur[] = "L'adresse e-mail n'est pas valide";
    }
    
    if($validation) {
        $inscription = $bdd->prepare("INSERT INTO projets(statut, nom, prenom, email, contact, adresse, fonction, origine, duree, accroche, liens, plan, budget, equipe) VALUES(:statut, :nom, :prenom, :email, :contact, :adresse, :fonction, :origine, :duree, :accroche, :liens, :plan, :budget, :equipe)");
        $inscription->execute([
            "statut" => htmlentities($statut),
            "nom" => htmlentities($nom),
            "prenom" => htmlentities($prenom),
            "email" => htmlentities($email),
            "contact" => htmlentities($contact),
            "adresse" => htmlentities($adresse),
            "fonction" => htmlentities($fonction),  
            "origine" => htmlentities($origine),
            "duree" => htmlentities($duree),
            "accroche" => htmlentities($accroche),
            "liens" => htmlentities($liens),
            "plan" => htmlentities($plan),
            "budget" => htmlentities($budget),
            "equipe" => htmlentities($equipe),
            
        ]);
        
        unset($_POST["statut"]);
        unset($_POST["nom"]);
        unset($_POST["prenom"]);
        unset($_POST["email"]);
        unset($_POST["contact"]);
        unset($_POST["adresse"]);
        unset($_POST["fonction"]);
        unset($_POST["origine"]);
        unset($_POST["duree"]);
        unset($_POST["accroche"]);
        unset($_POST["liens"]);
        unset($_POST["plan"]);
        unset($_POST["budget"]);
        unset($_POST["equipe"]);
    }
    
    return $erreur;
}



