<div class="articles row">
    <h1>登録</h1>
    <?= $this->Form->create($article) ?>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('age');
            echo $this->Form->input('posted_date', ['empty' => true, 'default' => '']);
        ?>
    <?= $this->Form->button(__('登録する'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
