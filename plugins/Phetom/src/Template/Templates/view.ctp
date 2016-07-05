<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Template'), ['action' => 'edit', $template->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Template'), ['action' => 'delete', $template->id], ['confirm' => __('Are you sure you want to delete # {0}?', $template->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Template Details'), ['controller' => 'TemplateDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template Detail'), ['controller' => 'TemplateDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="templates view large-9 medium-8 columns content">
    <h3><?= h($template->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($template->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($template->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($template->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($template->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Template Details') ?></h4>
        <?php if (!empty($template->template_details)): ?>
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
            <?php foreach ($template->template_details as $templateDetails): ?>
            <tr>
                <td><?= h($templateDetails->id) ?></td>
                <td><?= h($templateDetails->template_id) ?></td>
                <td><?= h($templateDetails->name) ?></td>
                <td><?= h($templateDetails->level) ?></td>
                <td><?= h($templateDetails->parent_id) ?></td>
                <td><?= h($templateDetails->endtime) ?></td>
                <td><?= h($templateDetails->created) ?></td>
                <td><?= h($templateDetails->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TemplateDetails', 'action' => 'view', $templateDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TemplateDetails', 'action' => 'edit', $templateDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TemplateDetails', 'action' => 'delete', $templateDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $templateDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
