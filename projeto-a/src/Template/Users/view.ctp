<h1><?php echo $user->name; ?></h1>

<ul>
	<li>
		<strong>Username:</strong>
		<?php echo $user->username; ?>
	</li>
	<li>
		<strong>E-mail:</strong>
		<?php echo $user->email; ?>
	</li>
	<li>
		<strong>Senha:</strong>
		<?php echo $user->password; ?>
	</li>
	<li>
		<strong>Criado em:</strong>
		<?php echo $user->created; ?>
	</li>
	<li>
		<strong>Modificado em:</strong>
		<?php echo $user->modified; ?>
	</li>
</ul>