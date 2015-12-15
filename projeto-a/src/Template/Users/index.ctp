<h3>Users</h3>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>EMAIL</th>
			<th>USERNAME</th>
			<th>ACTIONS</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results as $v):
		$linkView = $this->Html->link('Ver',
			['controller' => 'Users', 'action' => 'view', $v->id]);
		$linkEdit = $this->Html->link('Editar',
			['controller' => 'Users', 'action' => 'edit', $v->id]);
		$linkDelete = $this->Form->postLink('Excluir',
			['controller' => 'Users', 'action' => 'delete', $v->id]);
		?>
		<tr>
			<td><?php echo $v->id; ?></td>
			<td><?php echo $v->name; ?></td>
			<td><?php echo $v->email; ?></td>
			<td><?php echo $v->username; ?></td>
			<td>
				<?php echo $linkView; ?>
				<?php echo $linkEdit; ?>
				<?php echo $linkDelete; ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->Html->link('Novo',
	['controller' => 'Users', 'action' => 'add'],
	['class' => 'button']); ?>