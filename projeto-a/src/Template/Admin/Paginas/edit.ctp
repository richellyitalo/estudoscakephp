<?php
$config = [
	'class' => 'form-control',
	'templates' => 'app_form',
	'label' => [
		'class' => 'col-sm-2 control-label'
	]
];
echo $this->Form->create($pagina, ['class' => 'form-horizontal']);

echo $this->Form->input('id');
echo  $this->Form->input('titulo', $config);
echo $this->Form->input('conteudo', array_merge($config, ['class' => 'text-editor']));
echo $this->Form->input('url', $config);
echo $this->Form->button('Salvar', ['class' => 'btn btn-success']);

echo $this->Form->end();

echo $this->element('scriptEditor');