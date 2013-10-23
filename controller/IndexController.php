<?php
	session_start();

	// Contrôle le nom de la page actuelle et inclue le contrôleur de ladite page (c'est un peu redondant... :D)
	if(isset( $_GET['p']))
	{
		switch($_GET['p']) 
		{
			case 'listUsers':
				$content = "listUsers.php";
				$js = "default.js";
				break;

			case 'addUser':
				$content = "addUser.php";
				$js = "default.js";
				break;

			case 'addRight':
				$content = "addRight.php";
				$js = "default.js";
				break;

			case 'listDocuments':
				$content = "listDocuments.php";
				$js = "highlight.js";
				break;

			case 'addDocument':
				$content = "addDocument.php";
				$js = "default.js";
				break;

			case 'delDocument':
				$content = "delDocument.php";
				$js = "default.js";
				break;

			case 'listTypesDocument':
				$content = "listTypesDocument.php";
				$js = "default.js";
				break;

			case 'addTypeDocument':
				$content = "addTypeDocument.php";
				$js = "default.js";
				break;

			case 'search':
				$content = "search.php";
				$js = "default.js";
				break;

			case 'listResult':
				$content = "listResult.php";
				$js = "default.js";
				break;

			default:
				$content = "index.php";
				$js = "default.js";
				break;
		}
	}
	else
	{
		$content = "index.php";
		$js = "default.js";
	}
?>