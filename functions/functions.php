<?php

	function chargerClasse($classe)
	{
	  require $_SERVER['DOCUMENT_ROOT'].'/classes/'.$classe.'.class.php'; // On inclut la classe correspondante au paramètre passé.
	}
	spl_autoload_register('chargerClasse'); // Charge automatiquement les classes non déclarées

	function showInfo() {	
		// S'il y a des messages d'erreur
		if(!empty($_SESSION['info'])) {
			// On les affiche
			foreach ($_SESSION['info'] as $info) {
				echo "<div class='info'>".$info."</div>";
				// Et on les réinitialise
				unset($_SESSION['info']);
			}	
		}
	}
?>