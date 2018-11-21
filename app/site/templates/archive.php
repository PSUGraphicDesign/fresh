<? snippet('document/header', [
  'useMenu' => 'archive'
]) ?>

  <div class="archive">
    <div class="archive__intro">
      <h1 class="archive__title">Alumni Archive</h1>
    </div>
    <div class="archive__index">
      <? foreach ($years as $year) { ?>
        <div class="archive__year">
          <h2 class="archive__year-title"><?= $year->title() ?></h2>
          <div class="archive__terms">
            <? foreach ($year->terms() as $term) { ?>
              <div class="archive__term">
                <h3 class="archive__term-title"><?= $term->title() ?></h3>
                <div class="archive__grads">
                  <? snippet('blocks/grads-index', ['grads' => $term->grads()]) ?>
                </div>
              </div>
            <? } ?>
          </div>
        </div>
      <? } ?>
    </div>
  </div>

<? snippet('document/footer') ?>
