<?php snippet('document/header', [
  'useMenu' => 'archive'
]) ?>

<div class="archive">
  <div class="archive__intro">
    <div class="archive__logo">
      <?php snippet('blocks/responsive-image', ['image' => $archive->psugd_logo()->toFile()]) ?>
    </div>
    <h1 class="archive__title"><?= $archive->title() ?></h1>
    <div class="archive__description">
      <div class="text-content">
        <?= $archive->description()->kirbytext() ?>
      </div>
    </div>
  </div>

  <div class="archive__nav">
    <?php foreach ($archive->years()->sortBy('sort')->flip() as $year) { ?>
      <div class="archive__nav-year">
        <a class="archive__nav-year-link archive__nav-year-link--is-<?= $page->is($year) ? 'active' : 'inactive' ?>" href="<?= $year->url() ?>"><?= $year->title()->html() ?></a>
      </div>
    <?php } ?>
  </div>

  <div class="archive__index">
    <div class="archive__terms">
      <?php foreach ($page->terms()->sortBy('sort') as $term) { ?>
        <div class="archive__term" id="term-<?= $term->uid() ?>">
          <h3 class="archive__term-title"><?= $term->title() ?></h3>
          <div class="archive__grads">
            <?php if ($term->grads()->count() > 0) { ?>
              <?php snippet('blocks/grads-index', [
                'grads' => $term->grads(),
                'includeAltImage' => false,
              ]) ?>
            <?php } else { ?>
              <div class="text-content">
                <p>No graduates have been added for this term.</p>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php snippet('document/footer') ?>

