<div class="users form">
	<?php
	echo $this->Flash->render('auth');

	echo $this->Form->create();
	?>
	<fieldset>
		<legend>Digite nome de usuário e senha</legend>
		<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
	</fieldset>
	<?php
	echo $this->Form->button('Logar');
	echo $this->Form->end(); ?>

</div>