<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Flow Detail'), ['action' => 'edit', $flowDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Flow Detail'), ['action' => 'delete', $flowDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flowDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Flow Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flow Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flows'), ['controller' => 'Flows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flow'), ['controller' => 'Flows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Flow Details'), ['controller' => 'FlowDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Flow Detail'), ['controller' => 'FlowDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="flowDetails view large-9 medium-8 columns content">
    <h3><?= h($flowDetail->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Flow') ?></th>
            <td><?= $flowDetail->has('flow') ? $this->Html->link($flowDetail->flow->name, ['controller' => 'Flows', 'action' => 'view', $flowDetail->flow->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($flowDetail->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Flow Detail') ?></th>
            <td><?= $flowDetail->has('parent_flow_detail') ? $this->Html->link($flowDetail->parent_flow_detail->name, ['controller' => 'FlowDetails', 'action' => 'view', $flowDetail->parent_flow_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($flowDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($flowDetail->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Endtime') ?></th>
            <td><?= h($flowDetail->endtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($flowDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($flowDetail->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Flow Details') ?></h4>
        <?php if (!empty($flowDetail->child_flow_details)): ?>
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
            <?php foreach ($flowDetail->child_flow_details as $childFlowDetails): ?>
            <tr>
                <td><?= h($childFlowDetails->id) ?></td>
                <td><?= h($childFlowDetails->flow_id) ?></td>
                <td><?= h($childFlowDetails->name) ?></td>
                <td><?= h($childFlowDetails->level) ?></td>
                <td><?= h($childFlowDetails->parent_id) ?></td>
                <td><?= h($childFlowDetails->endtime) ?></td>
                <td><?= h($childFlowDetails->created) ?></td>
                <td><?= h($childFlowDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FlowDetails', 'action' => 'view', $childFlowDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FlowDetails', 'action' => 'edit', $childFlowDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FlowDetails', 'action' => 'delete', $childFlowDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childFlowDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
