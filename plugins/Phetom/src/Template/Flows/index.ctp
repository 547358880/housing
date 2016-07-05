<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Flow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flow Details'), ['controller' => 'FlowDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Flow Detail'), ['controller' => 'FlowDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="flows index large-9 medium-8 columns content">
    <h3><?= __('Flows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('template_id') ?></th>
                <th><?= $this->Paginator->sort('item_id') ?></th>
                <th><?= $this->Paginator->sort('starttime') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('remark') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flows as $flow): ?>
            <tr>
                <td><?= $this->Number->format($flow->id) ?></td>
                <td><?= $flow->has('template') ? $this->Html->link($flow->template->name, ['controller' => 'Templates', 'action' => 'view', $flow->template->id]) : '' ?></td>
                <td><?= $flow->has('item') ? $this->Html->link($flow->item->name, ['controller' => 'Items', 'action' => 'view', $flow->item->id]) : '' ?></td>
                <td><?= h($flow->starttime) ?></td>
                <td><?= h($flow->name) ?></td>
                <td><?= $this->Number->format($flow->type) ?></td>
                <td><?= h($flow->remark) ?></td>
                <td><?= h($flow->created) ?></td>
                <td><?= h($flow->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $flow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $flow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $flow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flow->id)]) ?>
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
