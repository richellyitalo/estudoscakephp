<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pagina'), ['action' => 'edit', $pagina->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pagina'), ['action' => 'delete', $pagina->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagina->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Paginas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagina'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="paginas view large-9 medium-8 columns content">
    <h3><?= h($pagina->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($pagina->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($pagina->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $pagina->has('categoria') ? $this->Html->link($pagina->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $pagina->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pagina->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($pagina->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($pagina->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Conteudo') ?></h4>
        <?= $this->Text->autoParagraph(h($pagina->conteudo)); ?>
    </div>
</div>
