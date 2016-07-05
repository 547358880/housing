<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Menu'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($menu->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Menu') ?></th>
            <td><?= $menu->has('parent_menu') ? $this->Html->link($menu->parent_menu->name, ['controller' => 'Menus', 'action' => 'view', $menu->parent_menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Icon') ?></th>
            <td><?= h($menu->icon) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($menu->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Rel') ?></th>
            <td><?= h($menu->rel) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($menu->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort') ?></th>
            <td><?= $this->Number->format($menu->sort) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($menu->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($menu->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Menus') ?></h4>
        <?php if (!empty($menu->child_menus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Sort') ?></th>
                <th><?= __('Icon') ?></th>
                <th><?= __('Url') ?></th>
                <th><?= __('Rel') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menu->child_menus as $childMenus): ?>
            <tr>
                <td><?= h($childMenus->id) ?></td>
                <td><?= h($childMenus->name) ?></td>
                <td><?= h($childMenus->parent_id) ?></td>
                <td><?= h($childMenus->level) ?></td>
                <td><?= h($childMenus->sort) ?></td>
                <td><?= h($childMenus->icon) ?></td>
                <td><?= h($childMenus->url) ?></td>
                <td><?= h($childMenus->rel) ?></td>
                <td><?= h($childMenus->created) ?></td>
                <td><?= h($childMenus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Menus', 'action' => 'view', $childMenus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Menus', 'action' => 'edit', $childMenus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Menus', 'action' => 'delete', $childMenus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childMenus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
