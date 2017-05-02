
<div class="actions columns large-2 medium-3">
    <h3><?= __('Meny') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('Startlista'), ['action' => 'index']) ?></li>
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
        <li><?= $this->Session->read('Auth.User.email') == 'smunks@yahoo.com' ? $this->Html->link(__('Nedräkning'), ['action' => 'start']) : ''?></li>
    </ul>
</div>

<div class="laps index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th width="20%"><?= $this->Paginator->sort('user_id') ?></th>
            <!-- <th><?= $this->Paginator->sort('milen') ?></th> -->
            <th width="5%"><?= $this->Html->image("green.gif") ?></th>
            <th width="5%"><?= $this->Html->image("yellow.gif") ?></th>
            <th width="5%"><?= $this->Html->image("orange.gif") ?></th>
            <th width="5%"><?= $this->Html->image("red.gif") ?></th>
            <th width="5%"><?= $this->Html->image("blue.gif") ?></th>
            <th width="5%"><?= $this->Html->image("black.gif") ?></th>
            <th width="10%"><?= $this->Paginator->sort('löptid') ?></th>
            <th width="10%"><?= $this->Paginator->sort('starttid') ?></th>
            <th width="10%"><?= $this->Paginator->sort('målgång') ?></th>
            <th width="10%"><?= $this->Paginator->sort('poäng') ?></th>
            <th width="10%" class="actions"><?= __('Ändra') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($laps as $lap): ?>
        <tr>
            <td>
                <?= $lap->has('user') ? $this->Html->link($lap->user->name, ['controller' => 'Users', 'action' => 'view', $lap->user->id]) : '' ?>
            </td>
            <td><?= h($lap->milen ? '<>' : '-') ?></td>
            <td><?= h($lap->femman ? '<>' : '-') ?></td>
            <td><?= h($lap->elljusspåret ? '<>' : '-') ?></td>
            <td><?= h($lap->två_och_halvan ? '<>' : '-') ?></td>
            <td><?= h($lap->tolvhundra ? '<>' : '-') ?></td>
            <td><?= h($lap->femhundra ? '<>' : '-') ?></td>
            <td><?= $this->Time->format($lap->löptid, 'HH:mm:ss') ?></td>
            <td><?= $this->Time->format($lap->starttid, 'HH:mm:ss') ?></td>
            <td><?= $lap->målgång ? $this->Time->format($lap->målgång, 'HH:mm:ss') : ($this->Session->read('Auth.User.email') == 'smunks@yahoo.com' ? $this->Html->link(__('Målgång'), ['action' => 'finish', $lap->id]) : '') ?></td>
            <td><?= h($lap->poäng) ?></td>
            <td class="actions">
                <?= ($lap->målgång ? '' :  ($lap->user_id == $this->Session->read('Auth.User.id'))? (1==1 ? $this->Html->link(__('Edit'), ['action' => 'edit', $lap->id]) : '') : '' ) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <!--
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    -->
</div>
