<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Member'), ['action' => 'edit', $member->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Member'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Members'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="members view large-9 medium-8 columns content">
    <h3><?= h($member->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($member->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($member->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Openid') ?></th>
            <td><?= h($member->openid) ?></td>
        </tr>
        <tr>
            <th><?= __('Nickname') ?></th>
            <td><?= h($member->nickname) ?></td>
        </tr>
        <tr>
            <th><?= __('Headimgurl') ?></th>
            <td><?= h($member->headimgurl) ?></td>
        </tr>
        <tr>
            <th><?= __('Tel') ?></th>
            <td><?= h($member->tel) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($member->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Login Ip') ?></th>
            <td><?= h($member->last_login_ip) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($member->id) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= $this->Number->format($member->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Follow Time') ?></th>
            <td><?= h($member->follow_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Reg Time') ?></th>
            <td><?= h($member->reg_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Login Time') ?></th>
            <td><?= h($member->last_login_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($member->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($member->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Sex') ?></th>
            <td><?= $member->sex ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
