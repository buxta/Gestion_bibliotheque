<?php 

	include 'config/config.php';
	include 'functions/functions.php';


	$document = new Document();
	$document = $document->getList();

 ?>

 <table class="default">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Code</th>
		</tr>
	</thead>
	<tbody>
<?php
	 foreach ($documents as $document) {
?>
	<tr>
		<td><?=$document->getTitre()?></td>
		<td><?=$document->getCode()?></td>
		<td><a class="action delete" href="./index.php?p=delUser&amp;id=<?=$user->getId()?>">Supprimer</a></td>
	 </tr>
<?php
	 }
?>
	</tbody>
</table>