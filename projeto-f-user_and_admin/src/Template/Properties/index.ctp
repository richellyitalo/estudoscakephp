<div class="container">
    <h1>
        Imóveis
    </h1>

	<?php if ($properties->count() > 0):?>
    <div class="row">
    	<?php foreach ($properties as $v): ?>
        <div class="col-xs-6 col-md-3">
            <?php
            $image = $this->Html->image('/uploads/sample.png');
            echo $this->Html->link($image, ['action' => 'view', $v->id], ['class' => 'thumbnail', 'escape' => false]);
            echo '<h5>'. $v->titulo .'</h5>';
            ?>
        </div>
    	<?php endforeach; ?>
    </div>
	<?php endif; ?>
</div>