<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Street'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="streets index large-9 medium-8 columns content">
    <h3><?= __('Streets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('area_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($streets as $street): ?>
            <tr>
                <td><?= $this->Number->format($street->id) ?></td>
                <td><?= $street->has('item') ? $this->Html->link($street->item->name, ['controller' => 'Items', 'action' => 'view', $street->item->id]) : '' ?></td>
                <td><?= $street->has('area') ? $this->Html->link($street->area->name, ['controller' => 'Areas', 'action' => 'view', $street->area->id]) : '' ?></td>
                <td><?= h($street->created) ?></td>
                <td><?= h($street->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $street->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $street->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $street->id], ['confirm' => __('Are you sure you want to delete # {0}?', $street->id)]) ?>
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
