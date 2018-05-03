<?php 


function afficher_produit(){
	include 'bdd_connection.php';
	$jointure = $pdo->query('SELECT * FROM produits LEFT JOIN marque ON marque_idMarque = idMarque');
	/*$req = $pdo -> prepare('SELECT nom_produit, description, lien, photo FROM produits WHERE Target_Model_idTarget_Model=:target');
	$req->execute(array('target'=>1));*/
	return $jointure;
}

function join_action_and_brand(){
	include 'bdd_connection.php';
	$jointure2 = $pdo->query('SELECT * FROM actions LEFT JOIN marque ON marque_idMarque = idMarque LEFT JOIN critere ON critere_idcritere = idcritere WHERE nom_marque = "Faguo"' );
	return $jointure2;
}

function join_brand_and_criteres(){
	include 'bdd_connection.php';
	$jointure3 = $pdo->query('SELECT * FROM marque LEFT JOIN marque_has_actions ON idMarque = marque_idMarque LEFT JOIN actions ON Actions_idactions = idactions WHERE nom_marque = "Veja"' );
	return $jointure3;
}

