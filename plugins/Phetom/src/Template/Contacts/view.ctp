<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact'), ['action' => 'edit', $contact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact'), ['action' => 'delete', $contact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contacts view large-9 medium-8 columns content">
    <h3><?= h($contact->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($contact->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($contact->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contact->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($contact->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($contact->modified) ?></td>
        </tr>
    </table>
</div>
