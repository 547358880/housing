<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Column'), ['action' => 'edit', $column->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Column'), ['action' => 'delete', $column->id], ['confirm' => __('Are you sure you want to delete # {0}?', $column->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Columns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Column'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Columns'), ['controller' => 'Columns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Column'), ['controller' => 'Columns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="columns view large-9 medium-8 columns content">
    <h3><?= h($column->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($column->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Pinyin') ?></th>
            <td><?= h($column->pinyin) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Column') ?></th>
            <td><?= $column->has('parent_column') ? $this->Html->link($column->parent_column->name, ['controller' => 'Columns', 'action' => 'view', $column->parent_column->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($column->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Level') ?></th>
            <td><?= $this->Number->format($column->level) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort') ?></th>
            <td><?= $this->Number->format($column->sort) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $this->Number->format($column->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($column->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($column->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($column->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Column Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Shorttitle') ?></th>
                <th><?= __('Color') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Keywords') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Author') ?></th>
                <th><?= __('Source') ?></th>
                <th><?= __('Pubdate') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Click') ?></th>
                <th><?= __('Isshow') ?></th>
                <th><?= __('Iscommend') ?></th>
                <th><?= __('Isbold') ?></th>
                <th><?= __('Istop') ?></th>
                <th><?= __('Ishot') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($column->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->column_id) ?></td>
                <td><?= h($articles->title) ?></td>
                <td><?= h($articles->shorttitle) ?></td>
                <td><?= h($articles->color) ?></td>
                <td><?= h($articles->description) ?></td>
                <td><?= h($articles->keywords) ?></td>
                <td><?= h($articles->content) ?></td>
                <td><?= h($articles->author) ?></td>
                <td><?= h($articles->source) ?></td>
                <td><?= h($articles->pubdate) ?></td>
                <td><?= h($articles->image) ?></td>
                <td><?= h($articles->click) ?></td>
                <td><?= h($articles->isshow) ?></td>
                <td><?= h($articles->iscommend) ?></td>
                <td><?= h($articles->isbold) ?></td>
                <td><?= h($articles->istop) ?></td>
                <td><?= h($articles->ishot) ?></td>
                <td><?= h($articles->user_id) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Columns') ?></h4>
        <?php if (!empty($column->child_columns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Pinyin') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Level') ?></th>
                <th><?= __('Sort') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($column->child_columns as $childColumns): ?>
            <tr>
                <td><?= h($childColumns->id) ?></td>
                <td><?= h($childColumns->name) ?></td>
                <td><?= h($childColumns->pinyin) ?></td>
                <td><?= h($childColumns->parent_id) ?></td>
                <td><?= h($childColumns->level) ?></td>
                <td><?= h($childColumns->sort) ?></td>
                <td><?= h($childColumns->type) ?></td>
                <td><?= h($childColumns->created) ?></td>
                <td><?= h($childColumns->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Columns', 'action' => 'view', $childColumns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Columns', 'action' => 'edit', $childColumns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Columns', 'action' => 'delete', $childColumns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childColumns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
