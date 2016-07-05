<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Template Detail'), ['action' => 'edit', $templateDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Template Detail'), ['action' => 'delete', $templateDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templateDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Template Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Template Details'), ['controller' => 'TemplateDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Template Detail'), ['controller' => 'TemplateDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="templateDetails view large-9 medium-8 columns content">
    <h3><?= h($templateDetail->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Template') ?></th>
            <td><?= $templateDetail->has('template') ? $this->Html->link($templateDetail->template->name, ['controller' => 'Templates', 'action' => 'view', $templateDetail->template->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($templateDetail->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Template Detail') ?></th>
            <td><?= $templateDetail->has('parent_template_detail') ? $this->Html->link($templateDetail->parent_template_detail->name, ['controller' => 'TemplateDetails', 'action' => 'view', $templateDetail->parent_template_detail->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($templateDetail->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($templateDetail->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Endtime') ?></th>
            <td><?= $this->Number->format($templateDetail->endtime) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($templateDetail->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($templateDetail->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Template Details') ?></h4>
        <?php if (!empty($templateDetail->child_template_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Template Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Endtime') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($templateDetail->child_template_details as $childTemplateDetails): ?>
            <tr>
                <td><?= h($childTemplateDetails->id) ?></td>
                <td><?= h($childTemplateDetails->template_id) ?></td>
                <td><?= h($childTemplateDetails->name) ?></td>
                <td><?= h($childTemplateDetails->level) ?></td>
                <td><?= h($childTemplateDetails->parent_id) ?></td>
                <td><?= h($childTemplateDetails->endtime) ?></td>
                <td><?= h($childTemplateDetails->created) ?></td>
                <td><?= h($childTemplateDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TemplateDetails', 'action' => 'view', $childTemplateDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TemplateDetails', 'action' => 'edit', $childTemplateDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TemplateDetails', 'action' => 'delete', $childTemplateDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childTemplateDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
