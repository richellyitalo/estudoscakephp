<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>
<div class="container">
    <!-- registro -->
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <h1>Cadastro de plano</h1>
          <?php
          echo $this->Form->create($plan, ['novalidate']);
            echo $this->Form->input('titulo');

            echo '<div class="row"><div class="col-md-6">';
            echo $this->Form->input('periodo');
            echo '</div><div class="col-md-6">';
            echo $this->Form->input('tipo', ['options' => $tipos]);
            echo '</div></div>';
            echo $this->Form->submit('Cadastrar', ['class' => 'btn btn-primary']);

          echo $this->Form->end();
          ?>
      </div>
    </div>
</div>