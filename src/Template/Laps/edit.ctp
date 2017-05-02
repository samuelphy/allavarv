<div class="laps form large-10 medium-9 columns">
    <?= $this->Form->create($lap); ?>
    <fieldset>
        <legend><?= __('Ändra vilka varv du vill springa och på vilken tid') ?></legend>
        <?php
            //echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('milen');
            echo $this->Form->input('femman');
            echo $this->Form->input('elljusspåret');
            echo $this->Form->input('två_och_halvan');
            echo $this->Form->input('tolvhundra');
            echo $this->Form->input('femhundra');
            echo $this->Form->input('löptid', ['type' => 'time', 'second' => ['true'], 'label' => 'Gissad löptid (h:m:s)']);
            //echo $this->Form->input('målgång');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Skicka')) ?>
    <?= $this->Form->end() ?>
</div>
