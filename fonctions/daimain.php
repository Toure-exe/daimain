<?php
function projets()
{
	global $bdd;

	$projets = $bdd->query("SELECT id, nom, prenom, accroche, fonction, budget FROM projets ORDER BY id DESC");
	if($projets){
	   $projets = $projets->fetchAll();
	   return $projets;
	} 
}

function projet() {
	global $bdd;

	$id = (int)$_GET['id'];

	$projet = $bdd->prepare("SELECT * FROM projets WHERE id = ?");
	$projet->execute([$id]);
	$projet = $projet->fetch();

	if (empty($projet)) {
		header("location: index.php");
	}else{
		return $projet;
	}
}
