<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="articles view large-10 medium-9 columns">
    <h2><?= h($article->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($article->name) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($article->id) ?></p>
            <h6 class="subheader"><?= __('Age') ?></h6>
            <p><?= $this->Number->format($article->age) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Posted Date') ?></h6>
            <p><?= h($article->posted_date) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($article->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($article->modified) ?></p>
        </div>
    </div>
</div>
