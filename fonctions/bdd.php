<?php
function bdd() {
	try {
		$bdd = new PDO('mysql:dbname=id18834107_daimain;host=localhost', 'id18834107_daimain_db', 'Uv4e[sKw9Lx\nZqS');
} catch (PDOException $e) {
	echo "Connexion échouée : " . $e->getMessage();
}
	return $bdd;
}?>