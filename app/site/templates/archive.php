<? snippet('document/header', [
  'useMenu' => 'archive'
]) ?>

<div class="archive">
  <div class="archive__intro">
    <div class="archive__logo">
      <? snippet('blocks/responsive-image', ['image' => $page->psugd_logo()->toFile()]) ?>
    </div>
    <h1 class="archive__title"><?= $page->title() ?></h1>
    <div class="archive__description">
      <div class="text-content">
        <?= $page->description()->kirbytext() ?>
      </div>
    </div>
  </div>
  <div class="archive__index">
    <? foreach ($years as $year) { ?>
      <div class="archive__year" id="<?= $year->uid() ?>">
        <h2 class="archive__year-title"><?= $year->title() ?></h2>
        <div class="archive__terms">
          <? foreach ($year->terms() as $term) { ?>
            <div class="archive__term" id="<?= "{$year->uid()}-{$term->uid()}" ?>">
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
