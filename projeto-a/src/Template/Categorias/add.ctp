<?php

echo $this->Form->create($categoria);

echo $this->Form->input('titulo');
echo $this->Form->input('url');
echo $this->Form->button('Salvar');

echo $this->Form->end();

?>