<?php
    include ('controller/IndexController.php');
    include ('config/config.php');
    include ('functions/functions.php');
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bibiliothèque (Doh!)</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link href="favicon.ico">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <header>
        	<div class="content">
        		<a href="./" id="logo">Bibiliothèque</a>
        		<nav id="mainMenu">
        			<ul>
        				<li><a href="./">Accueil</a></li><!--
        			 --><li>
                            <a href="./index.php?p=listUsers">Lecteurs</a>
                            <ul id="subMenu">
                                <li><a href="./index.php?p=addUser">Ajouter un lecteur</a></li>
                            </ul>
                        </li><!--
                     --><li><a href="./index.php?p=addRight">Ajouter des droits</a></li><!--
                     --><li>
                            <a href="./index.php?p=listDocuments">Documents</a>
                            <ul id="subMenu">
                                <li><a href="./index.php?p=addDocument">Ajouter un document</a></li>
                                <li><a class="change" href="./index.php?p=listTypesDocument">Types de documents</a></li>
                                <li><a href="./index.php?p=addTypeDocument">Ajouter type de document</a></li>
                            </ul>
                        </li><!--
                     --><li><a href="./index.php?p=search">Rechercher un document</a></li><!--
                     -->
        			</ul>
        		</nav>
        	</div>
        </header>
        <div id="main">
            <div class="content">
            	<!-- external content -->
            	<?php include ('view/'.$content); ?>
            </div>
        </div>
        <footer>
        	
        </footer>
        <script src="js/<?=$js?>"></script>        
    </body>
</html>