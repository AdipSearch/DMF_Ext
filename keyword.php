<?php 

function trouver_keywords(){
	global $pdo;
	$req = $pdo->query('SELECT type FROM produits');
	return $req;
};