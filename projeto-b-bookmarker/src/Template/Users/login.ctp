<h1>Login</h1>
<?php
// Form de login
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->button('Logar');
echo $this->Form->end();
?>