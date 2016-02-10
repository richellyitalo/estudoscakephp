<div class="container">

  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron">
    <h1>Olá, <?php echo $authUser['nome']; ?></h1>

    <?php if ($properties->count() > 0): ?>
    	<p>Você ainda não possui <strong>Imóvel</strong> publicado.
    		<?php echo $this->Html->link('Anuncie seu Imóvel',
    			['controller' => 'Properties', 'action' => 'add'],
    			['class' => 'btn btn-primary btn-lg']);
			?>
    	</p>
    <?php endif; ?>
  </div>

	<?php if ($properties->count() > 0): ?>
	<div class="row">
		<div class="col-md-6">
			<h2>Seus imóveis publicados</h2>
			<table class="table table-striped">
    				<thead>
    					<tr>
    						<th>ID</th>
    						<th>TÍTULO</th>
    						<th>PUBLICADO EM</th>
    						<th>ÚLTIMA MODIFICAÇÃO</th>
    						<th align="center">o</th>
    					</tr>
    				</thead>
    				<tbody>
    					<?php foreach ($properties as $v): ?>
    					<tr>
    						<td><?php echo $v->id ?></td>
    						<td><?php echo $v->titulo ?></td>
    						<td><?php echo $v->created ?></td>
    						<td><?php echo $v->modified ?></td>
    						<td>
    							<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
    									['controller' => 'Properties', 'action' => 'edit', $v->id], ['escape' => false]) ?>
    						</td>
    					</tr>
    					<?php endforeach; ?>
    				</tbody>
    			</table>
		</div>

	</div>
	<?php endif; ?>

</div> <!-- /container -->