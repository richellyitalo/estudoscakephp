<div class="row">
	<div class="span12">
		<div class="page-header">
			<h1>
				<?php echo $categoria->titulo; ?>
			</h1>
		</div>
	</div>
</div>

<h3>
	Páginas associadas
</h3>

<div class="row">
	<?php foreach ($categoria->paginas as $v) : ?>
		<div class="span6">
			<div class="media">
				<?php
					$img = $this->Html->image('icon-service1.png', [
						'class' => 'media-object'
					]);
					$url = $this->Url->build(
						[
							'controller' => 'Paginas',
							'action' => 'view',
							$v->url
						]);
					echo $this->Html->link($img,
						[
							'controller' => 'Paginas',
							'action' => 'view',
							$v->url
						],
						[
							'class' => 'pull-left',
							'escape' => false
						]);
				?>
				<div class="media-body">
					<h4 class="media-heading">
						<?php echo $v->titulo; ?>
					</h4>
					<p>
						<?php echo mb_substr($v->conteudo, 0, 150) . '...'; ?>
					</p>
					<a href="<?php echo $url; ?>" class="btn btn-success" type="button">Ver página</a>


				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>