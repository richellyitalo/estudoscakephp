<h3>Edição de Usuário</h3>

<?php
echo $this->Form->create($user);

echo $this->Form->input('id');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('Salvar');

echo $this->Form->end();
?>