<div class="ui negative message">
	<?php if (!empty($params['title'])):?>
	<div class="header">
		<?php echo h($params['title']); ?>
	</div>
	<?php endif; ?>

	<p><?php echo h($message); ?></p>
</div>
