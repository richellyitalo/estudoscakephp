<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

<div class="container">
  <div class="col-md-4 col-md-offset-1">
      <h1>Possuo cadastro</h1>
      <?php
      echo $this->Flash->render('auth');

      echo $this->Form->create(null, ['novalidate', 'url' => ['action' => 'login']]);
        echo $this->Form->input('email');

        echo $this->Form->input('password');

        echo $this->Form->submit('Logar', ['class' => 'btn btn-primary']);
      echo $this->Form->end();
      ?>
  </div>

  <!-- registro -->
  <div class="col-md-4 col-md-offset-2">
      <h1>Não possuo cadastro</h1>
      <?php
      echo $this->Form->create(null, ['novalidate', 'url' => ['action' => 'add']]);
        echo $this->Form->input('email');

        echo $this->Form->input('password');

        echo '<hr />';

        echo $this->Form->input('Nome');
        echo $this->Form->input('Endereço');

        echo $this->Form->submit('Cadastrar', ['class' => 'btn btn-primary']);
      echo $this->Form->end();
      ?>
  </div>
</div>