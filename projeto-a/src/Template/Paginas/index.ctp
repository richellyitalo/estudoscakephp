<h2>Páginas</h2>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>TÍTULO</th>
			<th>URL</th>
			<th>AÇÕES</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $v): ?>
		<tr>
			<td><?php echo $v->id; ?></td>
			<td><?php echo $v->titulo; ?></td>
			<td><?php echo $v->url; ?></td>
			<td>-~-</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>