<?php
$tpl = [
	'templates' => 'Admin.app_form',
	'autocomplete' => 'off'
]
?>
<div class="form-login ui two column centered grid">
	<div class="column">
  		<h4 class="ui dividing header">Login de usuário</h4>
		<?php
		echo $this->Flash->render('auth');

		echo $this->Form->create(null, ['class' => 'ui form', 'novalidate' => true]);

		echo $this->Form->input('email', array_merge($tpl, [
			'label' => ['text' => 'Email', 'escape' => false]
		]));
		echo $this->Form->input('password', $tpl);
		echo $this->Form->button('Logar', ['class' => 'ui button']);
		echo $this->Html->link('Não sou registrado', ['action' => 'registerCustomer']);

		echo $this->Form->end();
		?>
	</div>
</div>