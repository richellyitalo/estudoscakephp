<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>
<div class="container">
    <!-- registro -->
    <div class="col-md-6 col-md-offset-2">
        <h1>Não possuo cadastro</h1>
        <?php
        
        echo $this->Form->create($user, ['novalidate', 'url' => ['action' => 'add']]);
          echo $this->Form->input('email');

          echo $this->Form->input('password');

          echo '<hr />';

          echo '<div class="row"><div class="col-md-6">';
          echo $this->Form->input('nome');
          echo '</div><div class="col-md-6">';
          echo $this->Form->input('sobrenome',[]);
          echo '</div></div>';

          echo $this->Form->input('endereco', ['label' => ['text' => 'Endereço']]);

          echo $this->Form->submit('Cadastrar', ['class' => 'btn btn-primary']);
        echo $this->Form->end();
        ?>
    </div>
</div>