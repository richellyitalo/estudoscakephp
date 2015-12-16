<div class="users form">

	<?php echo $this->Flash->render('auth'); ?>

	<?php echo $this->Form->create(); ?>
	<fieldset>
		<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		?>
	</fieldset>
	<?php
	echo $this->Form->button('Logar');
	echo $this->Form->end();
	?>
</div>