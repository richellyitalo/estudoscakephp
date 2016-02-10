<div class="container">
    <!-- registro -->
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    	    <h1>Imóveis cadastrados</h1>

    			<?php if ($properties->count() > 0): ?>

		    	    <table class="table table-striped">
		    				<thead>
		    					<tr>
		    						<th>ID</th>
		    						<th>TÍTULO</th>
		    						<th>PUBLICADO EM</th>
		    						<th>ÚLTIMA MODIFICAÇÃO</th>
		    						<th>VENCIMENTO</th>
		    						<th align="center">o</th>
		    					</tr>
		    				</thead>
							<?php

		    				/*
		    				|--------------------------------------------------------------------------
		    				| IMÓVEIS ANUNCIADOS
		    				|--------------------------------------------------------------------------
		    				 */

		    				if ($propertiesAnunciados->count() > 0):
	    					?>
	    					<tbody>
	    						<tr>
	    							<th colspan="6" class="text-center alert alert-success">
	    								IMÓVEIS ANUNCIADOS
	    							</th>
	    						</tr>
	    					</tbody>

		    				<tbody>
		    					<?php foreach ($propertiesAnunciados as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->titulo ?></td>
		    						<td><?php echo $v->created ?></td>
		    						<td><?php echo $v->modified ?></td>
		    						<td><?php echo $v->advertisement->vencimento ?></td>
		    						<td>
	    								<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
    										['action' => 'edit', $v->id], ['escape' => false]) ?>
	    								<?php echo $this->Html->link('renovar plano',
    										['controller' => 'Advertisements', 'action' => 'renew', $v->advertisement->id], ['class' => 'btn btn-primary btn-xs']) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>

							<?php
							endif;

		    				/*
		    				|--------------------------------------------------------------------------
		    				| IMÓVEIS NÃO ANUNCIADOS
		    				|--------------------------------------------------------------------------
		    				 */
		    				
		    				if ($propertiesNaoAnunciados->count() > 0):
	    					?>
	    					<tbody>
	    						<tr>
	    							<th colspan="6" class="text-center alert alert-warning">
	    								IMÓVEIS NÃO ANUNCIADOS
	    							</th>
	    						</tr>
	    					</tbody>
		    				<tbody>
		    					<?php foreach ($propertiesNaoAnunciados as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->titulo ?></td>
		    						<td><?php echo $v->created ?></td>
		    						<td><?php echo $v->modified ?></td>
		    						<td></td>
		    						<td>
	    								<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
    										['action' => 'edit', $v->id], ['escape' => false]) ?>
	    								<?php echo $this->Html->link('anunciar imóvel',
    										['controller' => 'Advertisements', 'action' => 'add', $v->id], ['class' => 'btn btn-primary btn-xs']) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
		    				<?php endif;

		    				/*
		    				|--------------------------------------------------------------------------
		    				| IMÓVEIS VENCIDOS
		    				|--------------------------------------------------------------------------
		    				 */

		    				if ($propertiesVencidos->count() > 0):
		    				?>

	    					<tbody>
	    						<tr>
	    							<th colspan="6" class="text-center alert alert-danger">
	    								ANÚNCIOS VENCIDOS
	    							</th>
	    						</tr>
	    					</tbody>
		    				<tbody>
		    					<?php foreach ($propertiesVencidos as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->titulo ?></td>
		    						<td><?php echo $v->created ?></td>
		    						<td><?php echo $v->modified ?></td>
		    						<td><?php echo $v->advertisement->vencimento ?></td>
		    						<td>
	    								<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
    										['action' => 'edit', $v->id], ['escape' => false]) ?>
	    								<?php echo $this->Html->link('renovar plano',
    										['controller' => 'Advertisements', 'action' => 'add', $v->id], ['class' => 'btn btn-primary btn-xs']) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
		    				<?php endif; ?>
		    			</table>

    			<?php else: ?>

    			<h3>Não há imóveis cadastrados.</h3>
    			<p>
    				Anuncie seu primeiro imóvel, clicando
    				<?php echo $this->Html->link('AQUI',
    				['controller' => 'Properties', 'action' => 'add'],
    				['class' => 'btn btn-primary']);
    				?>
    			</p>

    			<?php endif; ?>
    	</div>
    </div>
</div>