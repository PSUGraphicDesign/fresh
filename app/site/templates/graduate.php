<? snippet('document/header') ?>

  <div class="grad">
    <div class="grad__content">
      <div class="grad__photo">
        <? snippet('blocks/responsive-image', ['image' => $page->profile_photo()->toFile()]) ?>
      </div>
      <h1 class="grad__name"><?= $page->title() ?></h1>
      <div class="grad__bio">
        <div class="text-content">
          <?= $page->bio() ?>
        </div>
      </div>
      <ul class="grad__buttons">
        <? foreach ($page->links()->toStructure() as $link) { ?>
          <li class="grad__button">
            <a class="grad__button--link" href="<?= $link->link() ?>" target="_blank"><?= $link->label() ?></a>
          </li>
        <? } ?>
      </ul>
      <ul class="grad__work-samples">
        <? foreach ($page->work_samples()->toStructure() as $sample) { ?>
          <li class="grad__work-sample">
            <div class="grad__work-sample--image">
              <? snippet('blocks/responsive-image', [
                'image' => $page->image($sample->image())
              ]) ?>
            </div>
            <div class="grad__work-sample--description">
              <div class="text-content">
                <?= $sample->description() ?>
              </div>
            </div>
          </li>
        <? } ?>
      </ul>
    </div>
  </div>

  <div class="grads">
    <div class="grads__content">
      <h2 class="grads__header">All Grads</h2>
      <? snippet('blocks/grads__index', ['grads' => $page->parent()->grads()]) ?>
    </div>
  </div>

<? snippet('document/footer') ?>
