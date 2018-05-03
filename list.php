<?php 
include 'bdd_connection.php';
include 'req_sql.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Des produits plus éthiques</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Khand|Roboto" rel="stylesheet">
	<link rel="stylesheet" href="style.css">

</head>
<body>
	<div class="container-fluid d-flex flex-column align-items-center">
		<header class="col-8">
			<div class="logo_entete col-3">
				<img class="logo" src="icon.png" alt="Logo Dress Me Fair">
			</div>
			<div class="text_entete col-9"><h1>DressMeFair vous propose des modèles plus responsables</h1></div>
		</header>


		<?php
		$req=afficher_produit();
		while ($data = $req->fetch()){
			?>

			<div class="product_place row col-10 ">
				
				<div class="row product_name_row col-12 d-flex justify-content-end">
					<h2 class="product_name col-md-4 col-xl-3"><?php echo $data['nom_marque'].' - '.$data['nom_produit'];?></h2>
				</div>

				<div class="row presentation_row col-12">

					<div class="col-2">
						<img class="img_product" src="<?php echo $data['photo'];?>" alt="<?php echo $data['nom_produit'];	?>">
					</div>
					
					<div class="row description_row col-10 d-flex align-items-center">
						<div class="col-12">
							<?php echo $data['description'];?>
						</div>
						<div class="row critere_list col-12 d-flex justify-content-start align-items-end ">
							<?php $req2=join_action_and_brand(); while ($data2 = $req2->fetch()){ ?>
							<div>
								<img class="logo_critere" src="<?php echo $data2['Logo_Critère'];?>" alt="<?php echo 'logo critere'. $data2['nom_critere'];?> ">
							</div>
							<?php } ?>
						</div>
						<div class="row explain_action col-12 d-flex align-items-start">
							<ul>
								<?php $req2=join_action_and_brand(); while ($data2 = $req2->fetch()){ ?>
								<li><?php echo $data2['Descriptif_action'];?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<a class="liensitesmarques" target="_blank" href="<?php echo $data['lien'];?>">Ouvrir le site web</a>
				<h1>---------------------------------------</h1>

			</div>

			<?php } ?>







		</div>
	</body>
	</html>