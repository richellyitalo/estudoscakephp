<h3>Novo Usuário</h3>

<?php
echo $this->Form->create($user);

echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('Salvar');

echo $this->Form->end();
?>