<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pagina->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pagina->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Paginas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paginas form large-9 medium-8 columns content">
    <?= $this->Form->create($pagina) ?>
    <fieldset>
        <legend><?= __('Edit Pagina') ?></legend>
        <?php
            echo $this->Form->input('titulo');
            echo $this->Form->input('conteudo');
            echo $this->Form->input('url');
            echo $this->Form->input('categoria_id', ['options' => $categorias, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
