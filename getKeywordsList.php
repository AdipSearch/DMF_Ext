<?php 
include 'bdd_connection.php';	
$req = $pdo->query('SELECT Target_keyword FROM target_keywords');

$keywordsList = array();

while ($data = $req->fetch())
{
	$keywordsList[] = $data['Target_keyword'];
}
echo json_encode($keywordsList);
?>