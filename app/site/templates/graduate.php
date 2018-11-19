<? snippet('document/header') ?>

  <div class="graduate">

    <div class="graduate__content">
      <div class="graduate__photo">
        <? snippet('blocks/responsive-image', ['image' => $page->profile_photo()->toFile()]) ?>
      </div>
      <h1 class="graduate__name"><?= $page->title() ?></h1>
      <div class="graduate__bio">
        <div class="text-content">
          <?= $page->bio() ?>
        </div>
      </div>
      <ul class="graduate__buttons">
        <? foreach ($page->links()->toStructure() as $link) { ?>
          <li class="graduate__button">
            <a class="graduate__button--link" href="<?= $link->link() ?>" target="_blank"><?= $link->label() ?></a>
          </li>
        <? } ?>
      </ul>
      <ul class="graduate__work-samples">
        <? foreach ($page->work_samples()->toStructure() as $sample) { ?>
          <li class="graduate__work-sample">
            <div class="graduate__work-sample--image">
              <? snippet('blocks/responsive-image', [
                'image' => $page->image($sample->image())
              ]) ?>
            </div>
            <div class="graduate__work-sample--description">
              <div class="text-content">
                <?= $sample->description() ?>
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
