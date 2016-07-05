<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Street'), ['action' => 'edit', $street->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Street'), ['action' => 'delete', $street->id], ['confirm' => __('Are you sure you want to delete # {0}?', $street->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Streets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Street'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="streets view large-9 medium-8 columns content">
    <h3><?= h($street->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $street->has('item') ? $this->Html->link($street->item->name, ['controller' => 'Items', 'action' => 'view', $street->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Area') ?></th>
            <td><?= $street->has('area') ? $this->Html->link($street->area->name, ['controller' => 'Areas', 'action' => 'view', $street->area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($street->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($street->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($street->modified) ?></td>
        </tr>
    </table>
</div>
