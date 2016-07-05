<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notice'), ['action' => 'edit', $notice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notice'), ['action' => 'delete', $notice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notices view large-9 medium-8 columns content">
    <h3><?= h($notice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $notice->has('item') ? $this->Html->link($notice->item->name, ['controller' => 'Items', 'action' => 'view', $notice->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($notice->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Is View') ?></th>
            <td><?= h($notice->is_view) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($notice->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notice->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notice->modified) ?></td>
        </tr>
    </table>
</div>
