<?php
echo $this->Form->create($pagina);

echo $this->Form->input('titulo', ['autofocus' => true]);
echo $this->Form->input('conteudo');
echo $this->Form->input('url');
echo $this->Form->button('Salvar');

echo $this->Form->end();
