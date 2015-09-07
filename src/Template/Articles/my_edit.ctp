<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">記事登録</h4>
</div>
<div class="modal-body">
    <?= $this->Form->create($article) ?>
    <?php
    echo $this->Form->input('name', ['class' => 'datepicker']);
    echo $this->Form->input('age');
    echo $this->Form->input('posted_date', ['empty' => true, 'default' => '']);
    ?>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <?= $this->Form->button(__('登録する'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->end() ?>
</div>
