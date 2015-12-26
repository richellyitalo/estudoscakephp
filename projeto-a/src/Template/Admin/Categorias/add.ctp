<?php

$config = [
	'class' => 'form-control',
	'templates' => 'app_form',
	'label' => [
		'class' => 'col-sm-2 control-label'
	]
];

echo $this->Form->create($categoria);

echo $this->Form->input('titulo', $config);
echo $this->Form->button('Salvar', ['class' => 'btn btn-success']);

echo $this->Form->end();

?>