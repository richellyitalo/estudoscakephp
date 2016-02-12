<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>
<div class="container">
    <!-- registro -->
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <h1>Selecione o plano</h1>
          <h3>Propriedade: <?php echo $advertisement->property->titulo; ?></h3>
          <?php
          echo $this->Form->create($advertisement, ['novalidate']);

            echo $this->Form->input('plan_id', ['options' => $plans, 'label' => ['text' => 'Selecione o plano']]);

            echo $this->Form->submit('Renovar', ['class' => 'btn btn-primary']);
          echo $this->Form->end();
          ?>
      </div>
    </div>
</div>