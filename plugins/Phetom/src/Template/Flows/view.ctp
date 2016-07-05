<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Flow'), ['action' => 'edit', $flow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Flow'), ['action' => 'delete', $flow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Flows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flow Details'), ['controller' => 'FlowDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flow Detail'), ['controller' => 'FlowDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="flows view large-9 medium-8 columns content">
    <h3><?= h($flow->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Template') ?></th>
            <td><?= $flow->has('template') ? $this->Html->link($flow->template->name, ['controller' => 'Templates', 'action' => 'view', $flow->template->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Item') ?></th>
            <td><?= $flow->has('item') ? $this->Html->link($flow->item->name, ['controller' => 'Items', 'action' => 'view', $flow->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($flow->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Remark') ?></th>
            <td><?= h($flow->remark) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($flow->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($flow->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Starttime') ?></th>
            <td><?= h($flow->starttime) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($flow->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($flow->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Flow Details') ?></h4>
        <?php if (!empty($flow->flow_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Flow Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Endtime') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($flow->flow_details as $flowDetails): ?>
            <tr>
                <td><?= h($flowDetails->id) ?></td>
                <td><?= h($flowDetails->flow_id) ?></td>
                <td><?= h($flowDetails->name) ?></td>
                <td><?= h($flowDetails->level) ?></td>
                <td><?= h($flowDetails->parent_id) ?></td>
                <td><?= h($flowDetails->endtime) ?></td>
                <td><?= h($flowDetails->created) ?></td>
                <td><?= h($flowDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FlowDetails', 'action' => 'view', $flowDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FlowDetails', 'action' => 'edit', $flowDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FlowDetails', 'action' => 'delete', $flowDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flowDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
