<!--
<div class="actions columns large-2 medium-3">
    <h3><?= __('Meny') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('Startlista'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Info'), ['action' => 'info']) ?></li>
        <li><?= $this->Html->link(__('Resultat 2014'), 'http://66.7.221.210/~allavarv/start_2014.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2013'), 'http://66.7.221.210/~allavarv/start_2013.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2012'), 'http://66.7.221.210/~allavarv/start_2012.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2011'), 'http://66.7.221.210/~allavarv/start_2011.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2010'), 'http://66.7.221.210/~allavarv/start_2010.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2009'), '') ?></li>
        <li><?= $this->Html->link(__('Resultat 2008'), 'http://66.7.221.210/~allavarv/start_2008.php') ?></li>
        <li><?= $this->Html->link(__('Resultat 2007'), 'http://66.7.221.210/~allavarv/start_2007.php') ?></li>
    </ul>
</div>
-->
<?= $this->Html->script('countdown.js', array('inline' => true)); ?>
<div class="laps index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th width="20%">User</th>
            <th width="10%"><?= $this->Paginator->sort('starttid') ?></th>
            <th width="10%">Countdown</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($laps as $lap): ?>
        <tr>
            <td>
                <?= $lap->has('user') ? $this->Html->link($lap->user->name, ['controller' => 'Users', 'action' => 'view', $lap->user->id]) : '' ?>
            </td>
            <td><?= $this->Time->format($lap->starttid, 'HH:mm:ss') ?></td> 
            <td><?= $this->Html->scriptStart(['block' => true]);
                //echo "<script language=\"JavaScript\">";
				echo "SpanId = \"cntdwn_id_". $lap->id ."\"";
				echo " TargetDate = \"5/02/2015 ". $this->Time->format($lap->starttid, 'HH:mm:ss') ."\""; 
				echo " BackColor = \"black\"";
				echo " ForeColor = \"white\"";
				echo " CountActive = true";
				echo " CountStepper = -1";
				echo " LeadingZero = true";
				echo " DisplayFormat = \"%%H%%:%%M%%:%%S%%\"";
				echo " FinishMessage = \"Har startat!\"";
				$this->Html->scriptEnd(); 
				?>
				<span id="cntdwn_id_<?= $lap->id ?>"</span>
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
