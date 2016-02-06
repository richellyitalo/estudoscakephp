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
    										['action' => 'edit', $v->id], ['escape' => false]) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
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