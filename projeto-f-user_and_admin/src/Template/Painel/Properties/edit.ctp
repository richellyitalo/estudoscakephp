<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>
<div class="container">
    <!-- registro -->
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
          <h1>Não possuo cadastro</h1>
          <?php
          echo $this->Form->create($property, ['novalidate']);
            echo $this->Form->input('titulo');

            echo $this->Form->input('quartos');

            echo $this->Form->input('endereco', ['label' => ['text' => 'Endereço']]);

            echo $this->Form->submit('Anunciar', ['class' => 'btn btn-primary']);
          echo $this->Form->end();
          ?>
      </div>
    </div>
</div>