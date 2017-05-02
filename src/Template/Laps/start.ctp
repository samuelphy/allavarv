<div class="actions columns large-2 medium-3">
    <h3><?= __('Meny') ?></h3>
    <ul class="side-nav">
    	<li><?= $this->Html->link(__('Startlista'), ['action' => 'index']) ?></li>
    	<li><?= $this->Html->link(__('Nedräkning'), ['action' => 'start']) ?></li>
        <li><?= $this->Html->link(__('Info'), ['action' => 'info']) ?></li>
    </ul>
</div>

<META HTTP-EQUIV=Refresh CONTENT="1; URL=start"> 

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
            <td><?php $startar = $this->Time->format($lap->starttid, 'HH:mm:ss');
            		$startTime = new DateTime($startar);
            	 	$now = new DateTime(date("H:i:s"));
					$difftid = $now->diff($startTime);
					//debug($difftid);
					if ($difftid->invert)
					{
						echo "Har startat!";
					}
					else
					{
						$starttid = new DateTime();
						$starttid->setTime($difftid->h, $difftid->i, $difftid->s);	
						echo $starttid->format('H:i:s');
					}
                 ?>
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
