<?php 
	showInfo();
?>
 <table class="default">
	<thead>
		<tr>
			<th>Titre</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php
	 if(!empty($_SESSION['searchResults'])) {	 
	 $documents = unserialize($_SESSION['searchResults']);
	 foreach ($documents as $document) {
?>
	
		<td><?=$document->getTitre()?></td>	
		<td class="actions">
			<form method="POST" action="/model/delDocument_processing.php?<?=$_SERVER['QUERY_STRING']?>">
				<input type="hidden" name="delDocument_idDocument" value="<?=$document->getIdDocument()?>">
				<input type="submit" class="button alert delete" name="delDocument_submit" value="X">
			</form>
		</td>
	 </tr>
<?php
	 }
	}
?>
	</tbody>
</table>