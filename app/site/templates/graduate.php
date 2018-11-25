<? snippet('document/header', [
  'bodyClasses' => [
    $page->isInCurrentTerm() ? 'document--is-current-term' : 'document--is-archived-term'
  ],
  'useMenu' => $page->isInCurrentTerm() ? 'current-term' : 'archive'
]) ?>

<? $graduateClasses = [
  'graduate',
  $page->isInCurrentTerm() ? 'graduate--is-current' : 'graduate--is-archived'
] ?>

<div class="<?= join($graduateClasses, ' ') ?>">
  <div class="graduate__content">
    <div class="graduate__photo">
      <? snippet('blocks/responsive-image', ['image' => $page->profile_photo()->toFile()]) ?>
    </div>
    <h1 class="graduate__name"><?= $page->title() ?></h1>
    <div class="graduate__interests">
      <? foreach ($page->tags()->split() as $tag) { ?>
        <span class="graduate__interest"><?= $tag ?></span>
      <? } ?>
    </div>
    <div class="graduate__bio">
      <div class="text-content">
        <?= $page->bio()->kirbytext() ?>
      </div>
    </div>
    <div class="graduate__buttons">
      <? foreach ($page->links()->toStructure() as $link) { ?>
        <a class="graduate__button" href="<?= $link->link() ?>" target="_blank"><?= $link->label() ?></a>
      <? } ?>
    </div>
    <ul class="graduate__work-samples">
      <? foreach ($page->work_samples()->toStructure() as $sample) { ?>
        <li class="graduate__work-sample">
          <? $workImage = $page->image($sample->image()) ?>
          <? $workImageClasses = [  
            'graduate__work-sample-image',
            $workImage->isLandscape() ? 'graduate__work-sample-image--landscape' : null,
            $workImage->isSquare() ? 'graduate__work-sample-image--square' : null,
            $workImage->isPortrait() ? 'graduate__work-sample-image--portrait' : null
          ] ?>
          <div class="<?= join(' ', array_filter($workImageClasses)) ?>">
            <? snippet('blocks/responsive-image', [
              'image' => $workImage
            ]) ?>
          </div>
          <div class="graduate__work-sample-description">
            <div class="text-content">
              <?= $sample->description()->kirbytext() ?>
            </div>
          </div>
        </li>
      <? } ?>
    </ul>
  </div>

  <div class="graduate__all-grads" id="grads">
    <div class="graduate__all-grads-content">
      <h2 class="graduate__all-grads-header">All Grads</h2>
      <? snippet('blocks/grads-index', ['grads' => $page->parent()->grads()]) ?>
    </div>
  </div>

</div>

<? snippet('document/footer') ?>
