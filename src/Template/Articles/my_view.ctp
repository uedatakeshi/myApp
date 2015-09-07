<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">記事参照</h4>
</div>
<div class="modal-body">
    <table class="table table-striped table-bordered">
        <tr>
            <th class="subheader"><?= __('Name') ?></th>
            <td><?= h($article->name) ?></td>
        </tr>
        <tr>
            <th class="subheader"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th class="subheader"><?= __('Age') ?></th>
            <td><?= $this->Number->format($article->age) ?></td>
        </tr>
        <tr>
            <th class="subheader"><?= __('Posted Date') ?></th>
            <td><?= h($article->posted_date) ?></td>
        </tr>
        <tr>
            <th class="subheader"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th class="subheader"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
