<?php 

	include "fonctions/bdd.php";
	include_once "fonctions/daimain.php";
	$bdd = bdd();
	$projet = projet();

	//SYCA-PAY
	$headers = array ('X-SYCA-MERCHANDID: C_62311BFA7B136', 'X-SYCA-APIKEY: pk_syca_a7f66cce2e4f59ae51e752c3fca9842aa9eed190', 'X-SYCA-REQUEST-DATA-FORMAT: JSON','X-SYCA-RESPONSE-DATAFORMAT: JSON');
	$paramsend = array ("montant" =>"100", "curr" =>"XOF");
	$url = "https://secure.sycapay.net/login";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_SSLVERSION ,CURL_SSLVERSION_TLSv1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$data_json = json_encode($paramsend);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
	$response = json_decode(curl_exec($ch),TRUE);

	if(empty ($response) ){
		echo "Error Number:".curl_errno($ch)."<br>"; echo "Error
		String:".curl_error($ch); $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	}
	curl_close($ch); 
	if($response['code'] == 0){
		$token = $response['token'];
		echo $token;
	}else{
		echo $response['code']; echo ">>>>>>>".$response['token'];
	}

?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daimain - Projet</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="detail.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
	
	<header class="container">
    <div class="logo"><a href="index.php"><img src="img/logo_small.png" height="60px" width="60px"></a></div>

   
  </header>

	  	<div class="row mt-5">
	  		
	  		<div class="col">
	  			
	  			<h1 class="capIni titreEvi"><?=  $projet['fonction']; ?></h1>
	  			<p style="font-size: 20px;"><?= $projet['accroche'];  ?></p>
	  			<div>
	  				<p style="margin-bottom: 30px;">par <span class="capIni" style="font-weight: 700;"><?= $projet['nom'] . " " . "<span style='text-transform: uppercase;'>" . $projet['prenom'] . "</span>" ?></span>, <?= $projet['statut'] . " de " . $projet['origine'] . ". " . $projet['contact'] . ", " . $projet['email']  ?></p>
	  			
	  		    </div>

	  		    <div class="motduPorteur mt-3">
	  		    	<h3><b>Réseaux</b></h3>
	  		    	<p style="margin-bottom: 20px"><?=  $projet['liens']; ?></p>
	  		    	<h3><b>Objectif</b></h3>
	  		    	<p style="margin-bottom: 20px"><?=  $projet['budget']; ?></p>
	  		    	<h3>Durée</h3>
	  		    	<p style="margin-bottom: 20px"><?=  $projet['duree']; ?></p>
	  		    	<h3><b>Plan d'exécution</b></h3>
	  		    	<p style="margin-bottom: 20px"><?=  $projet['plan']; ?></p>
	  		    	<h3><b>Présentation de l'équipe</b></h3>
	  		    	<p><?=  $projet['equipe']; ?></p>

	  		    </div>
	  		    <div class="col-xs-2">
					<form method="post" action="https://secure.sycapay.net/checkresponsive">
						<input type="hidden" name="token" value="<?= $token?>">
						<input type="hidden" name="amount" value="100">
						<input type="hidden" name="currency" value="XOF">
						<input type="hidden" name="urls" value="https://daimainservices.000webhostapp.com/index.php">
						<input type="hidden" name="urlc" value="https://daimainservices.000webhostapp.com/index.php">
						<input type="hidden" name="commande" value="COMTEST">
						<input type="hidden" name="merchandid" value="C_62311BFA7B136">
						<input type="hidden" name="typpaie" id="typpaie" value="payement">
					
    					
						
						<button type="submit" class="btn btn-success btn-lg">Contribuer</button>
					</form><br>
						
				</div>
	  		    
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