<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="properties view large-9 medium-8 columns content">
    <h3><?= h($property->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($property->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($property->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Areas') ?></h4>
        <?php if (!empty($property->areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->areas as $areas): ?>
            <tr>
                <td><?= h($areas->id) ?></td>
                <td><?= h($areas->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Areas', 'action' => 'view', $areas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Areas', 'action' => 'edit', $areas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Areas', 'action' => 'delete', $areas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
