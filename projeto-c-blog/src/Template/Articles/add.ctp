<h1>Adicionar Artigo</h1>

<?php
	echo $this->Form->create($article);
	echo $this->Form->input('title');
	echo $this->Form->input('category_id');
	echo $this->Form->input('body', ['rows' => '5']);
	echo $this->Form->button('Salvar');
	echo $this->Form->end();
 ?>