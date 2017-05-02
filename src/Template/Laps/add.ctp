<div class="laps form large-10 medium-9 columns">
    <?= $this->Form->create($lap); ?>
    <fieldset>
        <legend><?= __('Ange vilka varv du vill springa och på vilken tid') ?></legend>
        <?php
            //echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('milen');
            echo $this->Form->input('femman');
            echo $this->Form->input('elljusspåret');
            echo $this->Form->input('två_och_halvan');
            echo $this->Form->input('tolvhundra');
            echo $this->Form->input('femhundra');
            //echo $this->Form->input('löptid', ['type' => 'text', 'default' => 'hh:mm:ss']);
            //echo $this->Form->input('löptid', ['type' => 'time', 'second' => ['true']]);
            echo $this->Form->input('löptid', ['type' => 'time', 'second' => ['true'], 'label' => 'Gissad löptid (h:m:s)', 'default' => '01:02:03']);
            //echo $this->Form->input('målgång');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Skicka')) ?>
    <?= $this->Form->end() ?>
</div>
