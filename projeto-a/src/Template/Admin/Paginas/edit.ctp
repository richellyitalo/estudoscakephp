<?php
echo $this->Form->create($pagina);

echo $this->Form->input('id');
echo '<div class="form-group">' . $this->Form->input('titulo', ['class' => 'form-control', 'autofocus' => true]) . '</div>';
echo '<div class="form-group">' . $this->Form->input('conteudo', ['class' => 'form-control']) . '</div>';
echo '<div class="form-group">' . $this->Form->input('url', ['class' => 'form-control']) . '</div>';
echo '<div class="form-group">' . $this->Form->button('Salvar', ['class' => 'btn btn-success']) . '</div>';

echo $this->Form->end();