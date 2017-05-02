<h1>Välkommen till Rankås den 29 april 2017!</h1>
<h4>Alla Varv är tävlingen som går ut på att gissa sin löptid så bra som möjligt.</h4>
<h4>Alla kan vara med och springa då du själv väljer vilka spår du vill springa och på vilken tid.</h4>
<h4>I år har vi infört att vi rekommenderar att ni skänker 5 kr/km till <?= $this->Html->link('Naturskyddsföreningen', 'http://www.naturskyddsforeningen.se/vad-du-kan-gora/butiken/produkter/gava-till-skogen/') ?>.</h4>
<h4>Nytt för i år är också att målgången är kl 12:00.</h4>
Logga in eller skapa ett nytt konto nedan
<?= $this->Form->create(null, ['title' => 'Login form']) ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
<h3><?= $this->Html->link(__('Skapa nytt konto'), ['controller' => 'Users', 'action' => 'add']) ?></h3>
<!-- <h2>Anmälan stängd! Efteranmälan kan göras i Rankås.</h2> -->
<p>Skicka ett <?= $this->Html->link(__('mail'), 'mailto:smunks@yahoo.com') ?> ifall du undrar över något</p>
<p>	<?= $this->Html->image('varven.png', ['alt' => 'Varven i Rankås']) ?></p>