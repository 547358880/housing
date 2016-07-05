<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Streets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="streets form large-9 medium-8 columns content">
    <?= $this->Form->create($street) ?>
    <fieldset>
        <legend><?= __('Add Street') ?></legend>
        <?php
            echo $this->Form->input('item_id', ['options' => $items]);
            echo $this->Form->input('area_id', ['options' => $areas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
