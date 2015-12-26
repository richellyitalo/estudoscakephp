<?php
$config = [
	'class' => 'form-control',
	'templates' => 'app_form',
	'label' => [
		'class' => 'col-sm-2 control-label'
	]
];

echo $this->Form->create($pagina);

echo $this->Form->input('titulo', array_merge($config, ['autofocus' => true]));
echo $this->Form->input('conteudo', array_merge($config, ['class' => 'text-editor']));
echo $this->Form->input('categoria_id', $config);
echo $this->Form->button('Salvar', ['class' => 'btn btn-success']);

echo $this->Form->end();

echo $this->element('scriptEditor');
