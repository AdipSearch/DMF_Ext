<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Des produits plus éthiques</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Khand|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="ext_style.css">

</head>
<body>
	<header>
		<div class="logo_entete">
			<img class="logo" src="icon.png" alt="Logo Dress Me Fair">
		</div>
		<div class="text_entete"><h1>DressMeFair vous propose des modèles plus responsables</h1></div>
	</header>
	
	<?php 
	include 'bdd_connection.php';	
	$products_list = $pdo->query('SELECT * FROM DMF.produits RIGHT JOIN DMF.marque ON marque_idMarque = idMarque WHERE type="'.$_GET['keyword'].'" ');
	?>

	


	<?php
	while ($data = $products_list->fetch()){
	?>
	
	<p>

		<h2><?php echo $data['nom_marque'];	?> - <?php echo $data['nom_produit'];	?></h2>
		<img class="img_product" src="<?php echo $data['photo'];?>" alt="<?php echo $data['nom_produit'];	?>"></br>
		<a class="liensitesmarques" target="_blank" href="<?php echo $data['lien'];?>">Ouvrir le site web</a>
		<h1>---------------------------------------</h1>
	</p>

	<?php } ?>


</body>
</html>