<?php
	session_start();
	include ("../config/config.php");
	include ("../functions/functions.php");

	// Vérification des données
	if(!empty($_POST['addDocument_submit']))
	{
		if(!empty($_POST['addDocument_label'])) {
			$lastName = $_POST['addDocument_label'];
		}
		else
		{
			$info[] = "Veuillez entrer un libelle, pleutre.";
		}

		// S'il n'y a pas de message suite à la vérification des champs, on se prépare à envoyer les données
		if (empty($info)) {
			$data = $_POST['addDocument_label'];

			// On crée une instance de User
			$right = new Right();
			// Et on envoie les données dans sa fonction d'ajout dans la BDD
			$result = $right->insert($data);
			// Si les données ont été ajoutées, on affiche un message de succès
			if($result) {
				$info[] = "Droit ajouté à la base de données.";
			}
		}
	}

	$_SESSION['info'] = $info; // Met les messages d'erreurs dans une variable de session

	// On redirige sur la page précédente
	header("location: ../index.php?".$_SERVER['QUERY_STRING']);
?>