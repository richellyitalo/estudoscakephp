<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

<div class="container">
  <div class="col-md-4 col-md-offset-4">
      <h2 class="text-center">Login de administrador</h2>
      <?php
      echo $this->Flash->render('auth');

      echo $this->Form->create(null, ['novalidate', 'url' => ['action' => 'login']]);
        echo $this->Form->input('email');

        echo $this->Form->input('password');

        echo $this->Form->submit('Logar', ['class' => 'btn btn-primary']);
      echo $this->Form->end();
      ?>
  </div>
</div>