<div class="actions columns large-2 medium-3">
    <h3><?= __('Meny') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('Startlista'), ['controller' => 'laps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Info'), '/laps/info') ?></li>
        <li><?= $this->Html->link(__('Mina tidigare resultat'), ['controller' => 'Users', 'action' => 'view', $this->Session->read('Auth.User.id')]) ?></li>
        <li><?= $this->Html->link(__('Resultat 2016'), '/laps/index/2016') ?></li>
        <li><?= $this->Html->link(__('Resultat 2015'), '/laps/index/2015') ?></li>
        <li><?= $this->Html->link(__('Resultat 2014'), '/laps/index/2014') ?></li>
        <li><?= $this->Html->link(__('Resultat 2013'), '/laps/index/2013') ?></li>
        <li><?= $this->Html->link(__('Resultat 2012'), '/laps/index/2012') ?></li>
        <li><?= $this->Html->link(__('Resultat 2011'), '/laps/index/2011') ?></li>
        <li><?= $this->Html->link(__('Resultat 2010'), '/laps/index/2010') ?></li>
        <li><?= $this->Html->link(__('Resultat 2008'), '/laps/index/2008') ?></li>
        <li><?= $this->Html->link(__('Resultat 2007'), '/laps/index/2007') ?></li>
        <!--<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>-->
    </ul>
</div>
<div class="users view large-10 medium-9 columns">
    <h2><?= h($user->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($user->name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($user->email) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($user->created) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($user->updated) ?></p>
        </div>
    </div>
</div>
<!--<div class="related row">-->
<div>
    <div class="column large-10 medium-9 colums">
    <h4 class="subheader"><?= __('Resultat') ?></h4>
    <?php if (!empty($user->laps)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
        	<th><?= __('år') ?></th>
            <th><?= __('milen') ?></th>
            <th><?= __('femman') ?></th>
            <th><?= __('elljusspåret') ?></th>
            <th><?= __('två_och_halvan') ?></th>
            <th><?= __('tolvhundra') ?></th>
            <th><?= __('femhundra') ?></th>
            <th><?= __('gissad löptid') ?></th>
            <th><?= __('målgång') ?></th>
            <th><?= __('poäng') ?></th>
        </tr>
        <?php foreach ($user->laps as $laps): ?>
        <tr>
        	<td><?= h($this->Time->format($laps->målgång, 'YYYY')) ?></td>
            <td><?= h($laps->milen ? '<>' : '-') ?></td>
            <td><?= h($laps->femman ? '<>' : '-') ?></td>
            <td><?= h($laps->elljusspåret ? '<>' : '-') ?></td>
            <td><?= h($laps->två_och_halvan ? '<>' : '-') ?></td>
            <td><?= h($laps->tolvhundra ? '<>' : '-') ?></td>
            <td><?= h($laps->femhundra ? '<>' : '-') ?></td>
            <td><?= h($this->Time->format($laps->löptid, 'HH:mm:ss')) ?></td>
            <td><?= h($this->Time->format($laps->målgång, 'HH:mm:ss')) ?></td>
            <td><?= h($laps->poäng) ?></td>

        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
