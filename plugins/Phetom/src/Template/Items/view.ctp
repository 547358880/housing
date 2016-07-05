<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Flows'), ['controller' => 'Flows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Flow'), ['controller' => 'Flows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Streets'), ['controller' => 'Streets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Street'), ['controller' => 'Streets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="items view large-9 medium-8 columns content">
    <h3><?= h($item->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($item->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($item->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Mianji') ?></th>
            <td><?= h($item->mianji) ?></td>
        </tr>
        <tr>
            <th><?= __('Construction') ?></th>
            <td><?= h($item->construction) ?></td>
        </tr>
        <tr>
            <th><?= __('Period') ?></th>
            <td><?= h($item->period) ?></td>
        </tr>
        <tr>
            <th><?= __('Remark') ?></th>
            <td><?= h($item->remark) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($item->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($item->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($item->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Households') ?></th>
            <td><?= $this->Number->format($item->households) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= $this->Number->format($item->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Ok') ?></th>
            <td><?= $this->Number->format($item->ok) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($item->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($item->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Intro') ?></h4>
        <?= $this->Text->autoParagraph(h($item->intro)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Flows') ?></h4>
        <?php if (!empty($item->flows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Template Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Starttime') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->flows as $flows): ?>
            <tr>
                <td><?= h($flows->id) ?></td>
                <td><?= h($flows->template_id) ?></td>
                <td><?= h($flows->item_id) ?></td>
                <td><?= h($flows->starttime) ?></td>
                <td><?= h($flows->name) ?></td>
                <td><?= h($flows->type) ?></td>
                <td><?= h($flows->remark) ?></td>
                <td><?= h($flows->created) ?></td>
                <td><?= h($flows->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Flows', 'action' => 'view', $flows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Flows', 'action' => 'edit', $flows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Flows', 'action' => 'delete', $flows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $flows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Streets') ?></h4>
        <?php if (!empty($item->streets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Area Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($item->streets as $streets): ?>
            <tr>
                <td><?= h($streets->id) ?></td>
                <td><?= h($streets->item_id) ?></td>
                <td><?= h($streets->area_id) ?></td>
                <td><?= h($streets->created) ?></td>
                <td><?= h($streets->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Streets', 'action' => 'view', $streets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Streets', 'action' => 'edit', $streets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Streets', 'action' => 'delete', $streets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $streets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
