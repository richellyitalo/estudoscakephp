<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo PANEL_DESCRIPTION;
		if ($title = $this->fetch('title')) {
			echo ' \ ' . $title;
		}
		?>
	</title>
	<?php
	echo $this->Html->charset();
	echo $this->fetch('meta');
	echo $this->Html->css([
		'Admin./assets/vendor/semantic/dist/semantic.min',
		'Admin./assets/css/custom'
	]);
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>
<body>

	<?php
	echo $this->Flash->render();
	echo $this->fetch('content');
	?>

	<?php
	echo $this->Html->script([
		'Admin./assets/vendor/jquery/dist/jquery.min',
		'Admin./assets/vendor/semantic/dist/semantic.min'
	]);
	?>
</body>
</html>