<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Área administrativa</title>
	<?php echo $this->Html->css('/assets/vendor/bootstrap/dist/css/bootstrap.min.css'); ?>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Alternar navegação</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">RichSystem</a>
		    </div>
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active">
		        	<?php
		        	echo $this->Html->link('Páginas', [
		        			'prefix' => 'admin',
		        			'controller' => 'Paginas',
		        			'action' => 'index'
		        		]);
	        		?>
		        </li>
		        <li>
		        	<?php
		        	echo $this->Html->link('Categorias', [
		        			'prefix' => 'admin',
		        			'controller' => 'Categorias',
		        			'action' => 'index'
		        		]);
	        		?>
		        </li>
		      </ul>
		    </div>
		  </div>
	</nav>
	<div class="container-fluid">
		<?php echo $this->fetch('content'); ?>
	</div>

	<?php
		echo $this->Html->script([
			'/assets/vendor/jquery/dist/jquery.min',
			'/assets/vendor/bootstrap/dist/js/bootstrap.min.js'
		]);
		echo $this->fetch('scriptsBottom');
	?>
</body>
</html>