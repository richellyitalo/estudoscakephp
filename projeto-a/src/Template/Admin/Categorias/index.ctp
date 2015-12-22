<h2>Categorias</h2>
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
		<?php foreach ($results as $v):
			$linkEdit = $this->Html->link('Editar',
				['controller' => 'Categorias', 'action' => 'edit', $v->id]);
			$linkDelete = $this->Html->link('Excluir',
				['controller' => 'Categorias', 'action' => 'delete', $v->id]);
		?>
		<tr>
			<td><?php echo $v->id; ?></td>
			<td><?php echo $v->titulo; ?></td>
			<td><?php echo $v->url; ?></td>
			<td>
				<?php echo $linkEdit; ?>
				<?php echo $linkDelete; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->Html->link('Novo', ['controller' => 'Categorias', 'action' => 'add'], ['class' => 'button']); ?>

<?php echo $this->element('pagination'); ?>