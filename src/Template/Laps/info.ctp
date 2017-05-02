
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
    </ul>
</div>

<div class="laps index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>

    </thead>
    <tbody>
        <tr>
            <td>
                <h3>Regler f&ouml;r "Alla Varv i Rank&aring;s"</h3>
            </td>
        </tr>
            <tr><td>
            <ul>
          <li>Man kan v&auml;lja att springa s&aring; m&aring;nga varv man vill.
          <li>Man f&aring;r uppskatta tiden det tar att springa dessa varv
          <li>M&aring;let &auml;r att alla ska komma i m&aring;l klockan 12:00
          <li>Detta inneb&auml;r att man startar vid olika tider
          <li>Vinnare blir den som relativt av sin gissade totaltid kommer n&auml;rmast klockan 12:00
          <li>Po&auml;ngen r&auml;knas s&aring; h&auml;r med följande exempel:
          <br>Total l&ouml;pstr&auml;cka: 21900m. M&aring;lg&aring;ng: 11:52:10
          <br>Po&auml;ng: 21900m / (7*60+50)s = 46.6
          <li><b>Klockor &auml;r str&auml;ngt f&ouml;rbjudna!</b>
          </ul>
          </td>
        </tr>
		<tr><td>
			<?= $this->Html->image('varven.png', ['alt' => 'Varven i Rankås']) ?>
	<?= $this->Html->image('profil.png', ['alt' => 'Banprofil']) ?>
	    </td></tr>
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
