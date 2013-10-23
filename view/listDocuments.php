<?php 

	$documents = new Document();
	$documents = $documents->getList();

	showInfo();
?>
 <table class="default">
	<thead>
		<tr>
			<th>Id</th>
			<th>Titre</th>
			<th>Code</th>
			<th class="ref">Document référent</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php
	 foreach ($documents as $document) {
?>
	<tr data-id="<?=$document->getIdDocument()?>">
		<td><?=$document->getIdDocument()?></td>
		<td><?=$document->getTitre()?></td>
		<td><?=$document->getCode()?></td>
		<td class="ref"><?=$document->getDocumentRef()?></td>	
		<td class="actions">
			<form method="POST" action="/model/delDocument_processing.php?<?=$_SERVER['QUERY_STRING']?>">
				<input type="hidden" name="delDocument_idDocument" value="<?=$document->getIdDocument()?>">
				<input type="submit" class="button alert delete" name="delDocument_submit" value="X">
			</form>
		</td>
	 </tr>
<?php
	 }
?>
	</tbody>
</table>