<h2>Páginas</h2>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>TÍTULO</th>
			<th>URL</th>
			<th>CATEGORIA</th>
			<th>CRIADO</th>
			<th>MODIFICADO</th>
			<th width=20%>AÇÕES</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $v):
			$linkEdit = $this->Html->link('Editar',
				['controller' => 'Paginas', 'action' => 'edit', $v->id],
				['class' => 'btn btn-xs btn-info']);
			$linkDelete = $this->Form->postLink('Excluir',
				['controller' => 'Paginas', 'action' => 'delete', $v->id],
				['class' => 'btn btn-xs btn-danger']);
		?>
		<tr>
			<td><?php echo $v->id; ?></td>
			<td><?php echo $v->titulo; ?></td>
			<td><?php echo $v->url; ?></td>
			<td><?php echo $v->categoria->titulo; ?></td>
			<td><?php echo $v->created; ?></td>
			<td><?php echo $v->modified; ?></td>
			<td>
				<?php echo $linkEdit; ?>
				<?php echo $linkDelete; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php
	echo $this->Html->link('Novo',
		[
			'controller' => 'Paginas',
			'action' => 'add'
		],
		[
			'class' => 'btn btn-primary'
		]);
?>

<center>
	<?php echo $this->element('pagination'); ?>
</center>