<?php


include "fonctions/bdd.php";
include_once "fonctions/daimain.php";
$bdd = bdd();

$projets = projets();
?>

<!DOCTYPE html>

<html>

<head>

<title>Daimain - accueil</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="logo_small.png" type="image/png" sizes="16x16">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<link rel="stylesheet" type="text/css" href="index.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<section>

  <header class="container">
    <div class="logo"><a href="#"><img src="img/logo_small.png" height="60px" width="60px"></a></div>

    <nav>
      
      </ul>
    </nav>
  </header>

  <div class="container-fluid main">
  
      
<div class="content">
<h1 class="title">Vous avez une idée? Financez là!</h1>
<h2 class="mt-md-4 mt-3 mb-md-2">Le premier site de crowdfunding ivoirien.</h2>
<div class="row">
<div class="col-auto">
<a class="button-md button-primary mt-4" href="#projects">Découvrir les projets en cours de financement</a>
</div>
<div class="col-auto">
<a class="button-md button-primary-outline mt-4" id="js-financed-link" href="create.php">Financer mon projet</a>
</div>
</div>
</div>

</section>

   <div id="projects" class="container">
   <div class="text-center mt-5 "><h1>En cours de financement</h1></div>
   <div class="row mainContent">

    <?php 
      foreach ((array) $projets as $projet)  :
        ?>
        <div class="col-md-4 col-sm-6 card">
          <div class="card-header" style="background: #3D6763; color: #fff; font-size: 24px;"><?= $projet["fonction"] ?></div>
          <div class="card-body">
            <p style="margin-bottom: 30px;">par <span class="capIni" style="font-weight: 700;"><?= $projet['nom'] . " " . "<span style='text-transform: uppercase;'>" . $projet['prenom'] . "</span>" ?></p>
            
            <p class="card-text" style="margin-top: 15px;"><?= $projet["accroche"]; ?></p>
            <span style="font-weight: 700;">Objectif: <?= $projet['budget'] . " " . "FCFA" ?></span><br>
            <span style="font-weight: 700;">Collectés: 0</span>
          </div>
          <div class="card-footer" style="background: transparent; border-top: none; margin: 10px 0;">
            <a href="detail.php?id=<?= $projet["id"]; ?> style">Découvrir</a>
          </div>
        </div>
        <?php
      endforeach
    ?>
        

        
        
 </div>
</div>

<div class="container text-center bg-light pt-4">
  
<h3 class="boldText">Que souhaitez-vous ?</h3>
<div class="row pt-4">
  
    <div class="col">
      <span class="boldText3">Financer un projet?</span><br>

       <p style="font-size: 20px;"> Sélectionnez parmi les projets en cours de collecte de fonds, et apportez votre contribution avec la méthode de paiement que vous désirez.</p>
    </div>

    <div class="col">
      <span class="boldText3">Le financement de votre projet ?</span><br>

        <p style="font-size: 20px;">S'inscrire et soumettre son projet. Lancez votre campagne via les réseaux sociaux et via notre page Facebook.</p>

    </div>

</div>
</div>

  <div class="container-fluid" style="height:60px;"></div>

<div class="container-fluid">
    <div class="row moreInfos">

      <div class="col-sm-12 col-md-4 shadow p-3 mt-2 text-center moreInfo">
        <p class="boldText boldText2"> C’est quoi le financement participatif ?</p>
      <p>Le financement participatif ou « crowdfunding » … consiste à faire financer votre projet, votre activité ou une cause par la foule. Et, grâce à Internet, 
        la foule devient beaucoup plus facile à mobiliser et le financement participatif se développe très vite.
         Elle est désormais proche de vous!</p>
       </div>

      <div class="col-sm-12 col-md-4 shadow p-3 mt-2 text-center moreInfo">
        <p class="boldText boldText2">A qui s’adresse le financement participatif ?</p>
      <p>le financement participatif s’adresse aux personnes physiques ou aux personnes morales qui possède une BONNE IDEE de projet, d’activité ou de cause à défendre avec une forte UTILITE CITOYENNE et une dimension COLLECTIVE évidente. </p>
      </div>

      <div class="col-sm-12 col-md-4 shadow p-3 mt-2 text-center moreInfo">
        <p class="boldText boldText2">Rejoignez la communauté!</p>
        <a href="https://www.facebook.com/Daimainci/"><i class="bi bi-facebook fb"></i></a>
        <a href="https://chat.whatsapp.com/H8IqKIMCPytE4XAhRqweO2"><i class="bi bi-whatsapp wha"></i></a>
        <a href="https://t.me/+TLJF8_k5MNplMDQ0"><i class="bi bi-telegram tme"></i></a>
      </div>

    </div>

</div>

<div class="container-fluid" style="height: 60px;"></div>

  <div class="container-fluid mt-4">
    <div class="row mainPres">
      <div class="col-sm-6"><video id="daimainVideo" style="width: 100%;height: 100%;" autoplay muted><source src="img/spot.mp4" type="video/mp4"></video></div>
      <div class="col-sm-6 text-center d-flex flex-column pres ">
        <span id="presentation" class="boldText">Qui sommes-nous?</span>
      <p>La plateforme Daimain est une plateforme qui a pour but d'aider les entrepreneurs, porteurs, & organismes en s'appuyant sur les réalités Africaines que ceux-ci rencontrent durant leurs créations ou leurs existences d'où son nom Daimain mot malinké qui signifie aider.
         La plateforme espère réunir toutes l'Afrique autour d'une de ses valeurs propres à elle qui est l'entraide.</p>
      </div>
    </div>
  </div>


  
  <div class="container-fluid" style="height:60px;"></div>



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

<script>

var vid = document.getElementById("daimainVideo");
vid.loop = true; 

</script>

</body>
</html>

