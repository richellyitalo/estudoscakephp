<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="ui message <?php echo h($class) ?>">
	<?php if (!empty($params['title'])):?>
	<div class="header">
		<?php echo h($params['title']); ?>
	</div>
	<?php endif; ?>

	<p><?php echo $message; ?></p>
</div>