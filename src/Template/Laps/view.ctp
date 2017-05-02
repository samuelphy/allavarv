<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Lap'), ['action' => 'edit', $lap->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lap'), ['action' => 'delete', $lap->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lap->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Laps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lap'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="laps view large-10 medium-9 columns">
    <h2><?= h($lap->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $lap->has('user') ? $this->Html->link($lap->user->name, ['controller' => 'Users', 'action' => 'view', $lap->user->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($lap->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Löptid') ?></h6>
            <p><?= h($lap->löptid) ?></p>
            <h6 class="subheader"><?= __('Målgång') ?></h6>
            <p><?= h($lap->målgång) ?></p>
            <h6 class="subheader"><?= __('Updated') ?></h6>
            <p><?= h($lap->updated) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Milen') ?></h6>
            <p><?= $lap->milen ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Femman') ?></h6>
            <p><?= $lap->femman ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Elljussparet') ?></h6>
            <p><?= $lap->elljussparet ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Två Och Halvan') ?></h6>
            <p><?= $lap->två_och_halvan ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Tolvhundra') ?></h6>
            <p><?= $lap->tolvhundra ? __('Yes') : __('No'); ?></p>
            <h6 class="subheader"><?= __('Femhundra') ?></h6>
            <p><?= $lap->femhundra ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
