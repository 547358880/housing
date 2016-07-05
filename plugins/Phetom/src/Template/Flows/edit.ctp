<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $flow->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $flow->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Flows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Templates'), ['controller' => 'Templates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Template'), ['controller' => 'Templates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Flow Details'), ['controller' => 'FlowDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Flow Detail'), ['controller' => 'FlowDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="flows form large-9 medium-8 columns content">
    <?= $this->Form->create($flow) ?>
    <fieldset>
        <legend><?= __('Edit Flow') ?></legend>
        <?php
            echo $this->Form->input('template_id', ['options' => $templates, 'empty' => true]);
            echo $this->Form->input('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->input('starttime', ['empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('type');
            echo $this->Form->input('remark');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
