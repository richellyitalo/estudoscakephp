<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Paginas'), ['controller' => 'Paginas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pagina'), ['controller' => 'Paginas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($categoria->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($categoria->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($categoria->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($categoria->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Paginas') ?></h4>
        <?php if (!empty($categoria->paginas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Titulo') ?></th>
                <th><?= __('Conteudo') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Categoria Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->paginas as $paginas): ?>
            <tr>
                <td><?= h($paginas->id) ?></td>
                <td><?= h($paginas->titulo) ?></td>
                <td><?= h($paginas->conteudo) ?></td>
                <td><?= h($paginas->url) ?></td>
                <td><?= h($paginas->categoria_id) ?></td>
                <td><?= h($paginas->created) ?></td>
                <td><?= h($paginas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Paginas', 'action' => 'view', $paginas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Paginas', 'action' => 'edit', $paginas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Paginas', 'action' => 'delete', $paginas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paginas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
