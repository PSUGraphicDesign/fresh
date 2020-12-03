<?php snippet('document/header', [
  'useMenu' => 'archive',
  'term' => $page,
  'customTitle' => "Alumni Archive: {$page->title()} {$page->year()->title()}"
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
    <div class="archive__years">
      <?php foreach ($archive->years()->sortBy('sort')->flip() as $year) { ?>
        <div class="archive__year">
          <a class="archive__year-link archive__year-link--is-<?= $year->is($page->year()) ? 'active' : 'inactive' ?>" href="<?= $year->url() ?>"><?= $year->title()->html() ?></a>
        </div>
      <?php } ?>
    </div>
    <div class="archive__terms">
      <?php foreach ($page->year()->terms()->sortBy('sort') as $term) { ?>
        <div class="archive__term">
          <a class="archive__term-link archive__term-link--is-<?= $term->is($page) ? 'active' : 'inactive' ?>" href="<?= $term->url() ?>"><?= $term->title() ?></a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="archive__grads">
    <?php if ($page->grads()->count() > 0) { ?>
      <?php snippet('blocks/grads-index', [
        'grads' => $page->grads(),
        'includeAltImage' => false,
      ]) ?>
    <?php } else { ?>
      <div class="text-content">
        <p>No graduates have been added for this term.</p>
      </div>
    <?php } ?>
  </div>
</div>

<?php snippet('document/footer') ?>

