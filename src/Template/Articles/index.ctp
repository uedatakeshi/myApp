<div class="articles row">
    <h1>一覧</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('age') ?></th>
            <th><?= $this->Paginator->sort('posted_date') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('操作') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $this->Number->format($article->id) ?></td>
            <td><?= h($article->name) ?></td>
            <td><?= $this->Number->format($article->age) ?></td>
            <td><?= h($article->posted_date) ?></td>
            <td><?= h($article->created) ?></td>
            <td><?= h($article->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('参照'), ['action' => 'myView', $article->id], ['data-toggle' => 'modal', 'data-target' => '#myModal']) ?>
                <?= $this->Html->link(__('編集'), ['action' => 'myEdit', $article->id], ['data-toggle' => 'modal', 'data-target' => '#myModal']) ?>
                <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $article->id], ['confirm' => __('本当に削除しますか # {0}?', $article->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        ...
    </div>
  </div>
</div>

