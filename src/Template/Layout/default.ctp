<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Alla Varv i Rankås';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="header-title">
        	<span>Alla Varv i Rankås - 11:e året - </span>
        	<span><?= $this->Html->link($this->Html->image('Elphy101x30.png', ['alt' => 'E L P H Y']), 'https://www.elphy.se', array('escape' => false)) ?> & </span>
        	<span><?= $this->Html->link($this->Html->image('westlin270x30.png', ['alt' => 'Westlin running']), 'http://westlin.run', array('escape' => false)) ?></span>
            <!-- <span><?= $this->fetch('title') ?></span> -->
        </div>
        <div class="header-help">
        	<span><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></span>
        </div>
       <!-- <div class="header-help">
            <span><a target="_blank" href="http://book.cakephp.org/3.0/">Documentation</a></span>
            <span><a target="_blank" href="http://api.cakephp.org/3.0/">API</a></span>
        </div> -->
    </header>
    <div id="container">

        <div id="content">
            <?= $this->Flash->render() ?>
			<?= $this->Flash->render('auth') ?>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
        </footer>
    </div>
</body>
</html>
