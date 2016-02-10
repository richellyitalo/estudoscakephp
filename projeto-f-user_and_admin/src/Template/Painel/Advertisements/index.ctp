<div class="container">
    <!-- registro -->
    <div class="row">
    	<div class="col-md-8 col-md-offset-2">
    	    <h1>Anúncios</h1>
    	
    			<?php if ($advertisements->count() > 0): ?>
    	
		    	    <table class="table table-striped">
		    				<thead>
		    					<tr>
		    						<th>ID</th>
		    						<th>Propriedade</th>
		    						<th>Plano</th>
		    						<th>Status</th>
		    						<th>PUBLICADO EM</th>
		    						<th>VENCE EM</th>
		    						<th align="center">o</th>
		    					</tr>
		    				</thead>
		    				<tbody>
		    					<?php foreach ($advertisements as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->property->titulo ?></td>
		    						<td><?php echo $v->plan->titulo ?></td>
		    						<td><?php echo $v->status_for_human ?></td>
		    						<td><?php echo $v->created ?></td>
		    						<td><?php echo $v->vencimento ?></td>
		    						<td>
		    							<?php echo $this->Html->link('renovar plano',
    										['action' => 'renew', $v->id], ['class' => 'btn btn-primary btn-xs']) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
		    				<tbody>
		    					<tr>
		    						<th class="text-center" colspan="7">
										ANÚNCIOS VENCIDOS
		    						</th>
		    					</tr>
		    				</tbody>
		    				<tbody>
		    					<?php foreach ($advertisementsInvalid as $v): ?>
		    					<tr>
		    						<td><?php echo $v->id ?></td>
		    						<td><?php echo $v->property->titulo ?></td>
		    						<td><?php echo $v->plan->titulo ?></td>
		    						<td><?php echo $v->status_for_human ?></td>
		    						<td><?php echo $v->created ?></td>
		    						<td><?php echo $v->vencimento ?></td>
		    						<td>
			    						<?php echo $this->Html->link('renovar plano',
    										['action' => 'renew', $v->id], ['class' => 'btn btn-primary btn-xs']) ?>
		    						</td>
		    					</tr>
		    					<?php endforeach; ?>
		    				</tbody>
		    			</table>
    	
    			<?php else: ?>
    	
    			<h3>Não há anúncios cadastrados.</h3>
    			<p>
    				Na lista de imóveis, escolha o que deseja anunciar.
    				<?php echo $this->Html->link('AQUI',
    				['controller' => 'Properties', 'action' => 'index'],
    				['class' => 'btn btn-primary']);
    				?>
    			</p>
    	
    			<?php endif; ?>
    	</div>
    </div>
</div>