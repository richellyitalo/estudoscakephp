<?php

$config = [
	'class' => 'form-control',
	'templates' => 'app_form',
	'label' => [
		'class' => 'col-sm-2 control-label'
	]
];

echo $this->Form->create($categoria);

echo $this->Form->input('id');

echo $this->Form->input('titulo', $config);
echo $this->Form->button('Salvar', ['class' => 'btn btn-success']);

echo $this->Form->end();

?>

<h4>Paginas associadas</h4>
<ul class="list-group col-md-3">
	<?php foreach ($categoria->paginas as $v) : ?>
		<li class="list-group-item">
			<?php echo $v->id ?> : 
			<?php echo $v->titulo ?>
		</li>
	<?php endforeach; ?>
</ul>