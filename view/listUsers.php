<?php
	$users = new User();
	$users = $users->getList();
	
	showInfo();
?>
<table class="default">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Profession</th>
			<th>Employeur</th>
			<th>Inscription</th>
			<th>Admin</th>
			<th class="actions">Actions</th>
		</tr>
	</thead>
	<tbody>
<?php
	 foreach ($users as $user) {
?>
	<tr>
		<td><?=$user->getNom()?></td>
		<td><?=$user->getPrenom()?></td>
		<td><?=$user->getProfession()?></td>
		<td><?=$user->getEmployeur()?></td>
		<td><?=$user->getDateInscription()?></td>
		<td><?=$user->getAdmin()?></td>
		<td class="actions">
			<form method="POST" action="index.php?p=borrowDocument">
				<input type="hidden" name="delUser_idUsager" value="<?=$user->getIdUsager()?>">
				<input type="submit" class="button alert delete" name="delUser_submit" value="★" title="Emprunter un document">
			</form><!--
			--><form method="POST" action="/model/delUser_processing.php?<?=$_SERVER['QUERY_STRING']?>">
				<input type="hidden" name="delUser_idUsager" value="<?=$user->getIdUsager()?>">
				<input type="submit" class="button alert delete" name="delUser_submit" value="X" title="Supprimer l'utilisateur">
			</form>
		</td>
	</tr>
<?php
	 }
?>
	</tbody>
</table>