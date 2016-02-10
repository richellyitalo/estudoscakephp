<div class="container">
    <!-- registro -->
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    	    <h1>Planos cadastrados</h1>
    	
    			<?php if ($plans->count() > 0): ?>
    	
		    	    <table class="table table-striped">
		    				<thead>
		    					<tr>
		    						<th>ID</th>
		    						<th>TÍTULO</th>
		    						<th>PERÍODO</th>
		    						<th align="center">o</th>
		    					</tr>
		    				</thead>
		    				<tbody>
		    					<?php foreach ($plans as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->titulo ?></td>
		    						<td><?php echo $v->periodo; echo $v->periodo > 1 ? ' dias' : ' dia' ?></td>
		    						<td>
	    								<?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>',
    										['action' => 'edit', $v->id], ['escape' => false]) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
		    			</table>
    	
    			<?php else: ?>
    	
    			<h3>Não há planos cadastrados.</h3>
    			<p>
    				Crie um plano, clicando
    				<?php echo $this->Html->link('AQUI',
    				['controller' => 'Plans', 'action' => 'add'],
    				['class' => 'btn btn-primary']);
    				?>
    			</p>
    	
    			<?php endif; ?>
    	</div>
    </div>
</div>