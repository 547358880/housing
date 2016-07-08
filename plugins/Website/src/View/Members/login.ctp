<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

?>
<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __d('Users', 'Please enter your username and password') ?></legend>
        <?= $this->Form->input('username', ['required' => true]) ?>
        <?= $this->Form->input('password', ['required' => true]) ?>
    </fieldset>
    <?= $this->Form->button(__d('Users', 'Login')); ?>
    <?= $this->Form->end() ?>
</div>
