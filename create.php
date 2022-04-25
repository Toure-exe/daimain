<?php


include "fonctions/bdd.php";
include_once "fonctions/daimain.php";
include_once "fonctions/projet.php";
$bdd = bdd();
if(!empty($_POST))
    $erreurs = inscription();
?>

<!DOCTYPE html>
<html>
<head>
<title>Daimain - Financez son projet</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="create.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
	<div class="container">
	<header class="container">
    <div class="logo"><a href="index.php"><img src="img/logo_small.png" height="60px" width="60px"></a></div>

    <nav>
      <ul>
        <li><a href="index.php" class="dispensable">Qui sommes-nous?</a></li>
        <li><a href="index.php">Découvrir les projets en cours</a></li>

      </ul>
    </nav>
  </header>
		<div class="row main">
			<div class="col pt-4 createForm">
				
				<form method="post" action="">
					<?php
            if(isset($erreurs)) :
            if($erreurs) :
            foreach($erreurs as $erreur) :
            ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="message erreur"><?= $erreur ?></div>
                </div>
            </div>
            <?php
            endforeach;
            else :
            ?>
            <div class="row">
                <div class="col bg-succes" style="padding: 7px 0; color: #fff;">
                    <div class="message confirmation text-center" style="padding: 10px 0px; color: #fff; background: #3D6763;">L'inscription de votre projet a bien été prise en compte !</div>
                </div>
            </div>
            <?php
            endif;
            endif;
            ?>
					<label for="">Je suis</label>
					<select name="statut" id="" value="<?php if(isset($_POST["statut"])) echo $_POST["statut"] ?>">
						<option  value="selectionne" disabled selected >Sélectionner</option>
						<option value="entrepreneur">Entrepreneur(e)</option>
						<option value="association">Association</option>
						<option value="ong">ONG</option>
					</select>
					<label for="">Nom</label>
					<input type="text" name="nom" value="<?php if(isset($_POST["nom"])) echo $_POST["nom"] ?>">
					<label for="">Prénom(s)</label>
					<input type="text" name="prenom" value="<?php if(isset($_POST["prenom"])) echo $_POST["prenom"] ?>">
					<label for="">Email</label>
					<input type="text" name="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"] ?>">
					<label for="">Contact</label>
					<input type="text" name="contact" value="<?php if(isset($_POST["contact"])) echo $_POST["contact"] ?>">
					<label for="">Adresse</label>
					<input type="text" name="adresse" value="<?php if(isset($_POST["adresse"])) echo $_POST["adresse"] ?>">
					<label for="">Fonction / Secteur d'activité</label>
					<input type="text" name="fonction" value="<?php if(isset($_POST["fonction"])) echo $_POST["fonction"] ?>">
					<label for="">Pays d'origine</label>
					<input type="text" name="origine" value="<?php if(isset($_POST["origine"])) echo $_POST["origine"] ?>">
                <label for="">Durée de campagne</label>
				<select name="duree" id="" value="<?php if(isset($_POST["duree"])) echo $_POST["duree"] ?>">
					<option value="selectionne" disabled selected >Sélectionner</option>
					<option value="3">3 mois</option>
					<option value="4">4 mois</option>
					<option value="6">6 mois</option>
					<option value="12">12 mois</option>
				</select>
					<label for="">Message d'accroche</label>
					<textarea name="accroche" id="" cols="30" rows="5"><?php if(isset($_POST["accroche"])) echo $_POST["accroche"] ?></textarea>
					<label>Liens vers vos réseaux</label>
					<input type="text" name="liens" value="<?php if(isset($_POST["liens"])) echo $_POST["liens"] ?>">
					<label for="">Plan d'exécution</label>
					<textarea name="plan" id="" cols="30" rows="5"><?php if(isset($_POST["plan"])) echo $_POST["plan"] ?></textarea>
					<label for="">Budget détaillé du projet(en FCFA)</label>
					<input type="number" name="budget" id="" value="<?php if(isset($_POST["budget"])) echo $_POST["budget"] ?>">
					<label for="">Presentation de l'equipe</label>
					<textarea name="equipe" id="" cols="30" rows="5"><?php if(isset($_POST["equipe"])) echo $_POST["equipe"] ?></textarea>
				<p class="text-center pt-4">En validant ton inscription, tu acceptes les <a href="#">Conditions Générales d'Utilisation</a></p>
					<input type="submit" value="Lancer son projet">
				</form>
			</div>
			<div class="col partTwo">
				<h1 class="text-center ">Parlez-nous de vous et de votre projet</h1> <br>
				<p class="text-center ">Suite à ce formulaire vos données personnelles seront collectées et traitées par DAIMAIN dans le cadre de l'exécution de la mission de prestataires de sevices financiers participatif.</p>
			</div>
		</div>
		

	</div>
<footer>
  
  	<div class="container-fluid">
    	<div class="row firstPartOfFooter">

      	<div class="col-sm-6 col-12 footerContent">
        	<span>Mentions légales</span>
        	<a href="#">CGU DAIMAIN</a>
        	<a href="#">Mentions Légales</a>

      	</div>
      	<div class="col-sm-6 col-12 footerContent">
        	<span>Aide et contacts</span>

        	<a href="#">Notre équipe vous répond au<br>01 02 03 04 05</a>
        	<a href="#">daimainofficiel@gmail.com</a>
      	</div>
    	</div>
    	<div class=" row lastPartOfFooter text-white">
    	<div class="col-sm-12 p-3 footerContent2">
      	<span class="nameStyled" >DAIMAIN</span>
      	<span>© Copyright DAIMAIN - Tous droits réservés</span>
    	</div>
    	</div>
  	</div>

	</footer>



</body>
</html>