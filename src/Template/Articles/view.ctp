<div class="articles view row">
    <h2><?= h($article->name) ?></h2>
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
</div>
