<?php echo $this->Flash->render(); ?>
<?php echo $this->Flash->render('auth'); ?>
<h1>Artigos</h1>
<?php echo $this->Html->link('Adicionar artigo', ['action' => 'add']); ?>
<table>
	<tr>
		<th>Id</th>
		<th>Título</th>
		<th>Criado</th>
		<th>~</th>
	</tr>
	<?php foreach ($articles as $article): ?>
	<tr>
		<td><?php echo $article->id; ?></td>
		<td><?php echo $this->Html->link($article->title, ['action' => 'view', $article->id]); ?></td>
		<td><?php echo $article->created->format('d/m/Y'); ?></td>
		<td>
			<?php
			echo $this->Form->postLink(
					'Deletar',
					['action' => 'delete', $article->id],
					['confirm' => 'Tem certeza?']);
			 ?>
			<?php echo $this->Html->link('Editar', ['action' => 'edit', $article->id]); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>