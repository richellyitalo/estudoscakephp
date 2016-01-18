<div class="users from">
	<?php echo $this->Form->create($user); ?>
	<fieldset>
		<legend>Adicionar usuário</legend>
		<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role', [
			'options' => ['admin' => 'Admin', 'author' => 'Author']
		]);
		?>
	</fieldset>
	<?php
	echo $this->Form->button('Enviar');
	echo $this->Form->end(); ?>
</div>