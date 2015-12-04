<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pagina'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="paginas index large-9 medium-8 columns content">
    <h3><?= __('Paginas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($paginas as $pagina): ?>
            <tr>
                <td><?= $this->Number->format($pagina->id) ?></td>
                <td><?= h($pagina->titulo) ?></td>
                <td><?= h($pagina->url) ?></td>
                <td><?= $pagina->has('categoria') ? $this->Html->link($pagina->categoria->titulo, ['controller' => 'Categorias', 'action' => 'view', $pagina->categoria->id]) : '' ?></td>
                <td><?= h($pagina->created) ?></td>
                <td><?= h($pagina->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pagina->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pagina->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pagina->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagina->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
