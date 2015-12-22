<h1><?php echo $result->titulo; ?></h1>

<dl>
	<dt>modificado em</dt>
	<dd><?php echo $result->modified; ?></dd>
	<dt>criado em</dt>
	<dd><?php echo $result->created; ?></dd>
</dl>

<div class="entry-text">
	<?php echo $result->conteudo; ?>
</div>