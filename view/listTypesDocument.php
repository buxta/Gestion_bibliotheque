<?php 
	$typesDocument = new TypeDocument();
	$typesDocument = $typesDocument->getList();

	showInfo();
 ?>

 <table class="default">
	<thead>
		<tr>
			<th>Libellé</th>
			<th>Durée d'emprunt maximum</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php
	 foreach ($typesDocument as $typeDocument) {
?>
	<tr>
		<td><?=$typeDocument->getLibelle()?></td>
		<td><?=$typeDocument->getNbJourEmprunt()?> jours</td>	
		<td class="actions">
			<form method="POST" action="/model/delTypeDocument_processing.php?<?=$_SERVER['QUERY_STRING']?>">
				<input type="hidden" name="delTypeDocument_idTypeDocument" value="<?=$typeDocument->getIdTypeDocument()?>">
				<input type="submit" class="button alert delete" name="delTypeDocument_submit" value="X">
			</form>
		</td>
	 </tr>
<?php
	 }
?>
	</tbody>
</table>