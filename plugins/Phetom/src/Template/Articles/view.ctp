<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Columns'), ['controller' => 'Columns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Column'), ['controller' => 'Columns', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Column') ?></th>
            <td><?= $article->has('column') ? $this->Html->link($article->column->name, ['controller' => 'Columns', 'action' => 'view', $article->column->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Shorttitle') ?></th>
            <td><?= h($article->shorttitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Color') ?></th>
            <td><?= h($article->color) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($article->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Keywords') ?></th>
            <td><?= h($article->keywords) ?></td>
        </tr>
        <tr>
            <th><?= __('Author') ?></th>
            <td><?= h($article->author) ?></td>
        </tr>
        <tr>
            <th><?= __('Source') ?></th>
            <td><?= h($article->source) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($article->image) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $article->has('user') ? $this->Html->link($article->user->id, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Click') ?></th>
            <td><?= $this->Number->format($article->click) ?></td>
        </tr>
        <tr>
            <th><?= __('Isshow') ?></th>
            <td><?= $this->Number->format($article->isshow) ?></td>
        </tr>
        <tr>
            <th><?= __('Iscommend') ?></th>
            <td><?= $this->Number->format($article->iscommend) ?></td>
        </tr>
        <tr>
            <th><?= __('Isbold') ?></th>
            <td><?= $this->Number->format($article->isbold) ?></td>
        </tr>
        <tr>
            <th><?= __('Istop') ?></th>
            <td><?= $this->Number->format($article->istop) ?></td>
        </tr>
        <tr>
            <th><?= __('Ishot') ?></th>
            <td><?= $this->Number->format($article->ishot) ?></td>
        </tr>
        <tr>
            <th><?= __('Pubdate') ?></th>
            <td><?= h($article->pubdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($article->content)); ?>
    </div>
</div>
