<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Area'), ['action' => 'edit', $area->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Area'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Streets'), ['controller' => 'Streets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Street'), ['controller' => 'Streets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="areas view large-9 medium-8 columns content">
    <h3><?= h($area->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($area->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Longitude') ?></th>
            <td><?= h($area->longitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Latitude') ?></th>
            <td><?= h($area->latitude) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Area') ?></th>
            <td><?= $area->has('parent_area') ? $this->Html->link($area->parent_area->name, ['controller' => 'Areas', 'action' => 'view', $area->parent_area->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Zoom') ?></th>
            <td><?= h($area->zoom) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($area->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($area->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($area->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Areas') ?></h4>
        <?php if (!empty($area->child_areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Longitude') ?></th>
                <th><?= __('Latitude') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Zoom') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->child_areas as $childAreas): ?>
            <tr>
                <td><?= h($childAreas->id) ?></td>
                <td><?= h($childAreas->name) ?></td>
                <td><?= h($childAreas->longitude) ?></td>
                <td><?= h($childAreas->latitude) ?></td>
                <td><?= h($childAreas->parent_id) ?></td>
                <td><?= h($childAreas->zoom) ?></td>
                <td><?= h($childAreas->created) ?></td>
                <td><?= h($childAreas->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Areas', 'action' => 'view', $childAreas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Areas', 'action' => 'edit', $childAreas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Areas', 'action' => 'delete', $childAreas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAreas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Streets') ?></h4>
        <?php if (!empty($area->streets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Item Id') ?></th>
                <th><?= __('Area Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($area->streets as $streets): ?>
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
