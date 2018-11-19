<? snippet('document/header') ?>

<div class="term">

  <div class="term__hero">
    <div class="term__hero-content">
      <? snippet('blocks/responsive-image', ['image' => $term->hero()->toFile()]) ?>
    </div>
  </div>

  <div class="term__details">
    <ul class="term__details-items">
      <li class="term__details-item term__details-item--what">
        <div class="text-content">
          <?= $term->what()->kirbytext() ?>
        </div>
      </li>
      <li class="term__details-item term__details-item--when">
        <div class="text-content">
          <?= $term->when()->kirbytext() ?>
        </div>
      </li>
      <li class="term__details-item term__details-item--where">
        <div class="text-content">
          <?= $term->where()->kirbytext() ?>
        </div>
      </li>
    </ul>
  </div>


  <div class="term__about">
    <div class="term__about-content">
      <div class="term__about-message">
        <div class="text-content">
          <?= $term->about()->kirbytext() ?>
        </div>
      </div>
    </div>
  </div>

  <div class="term__grads" id="grads">
    <div class="term__grads-content">
      <h2 class="term__grads-header"><?= $term->grads_header() ?></h2>
      <? snippet('blocks/grads-index', ['grads' => $term->grads()]) ?>
    </div>
  </div>

  <div class="term__sponsors">
    <h2 class="term__sponsors-header"><?= $term->sponsors_header() ?></h2>
    <ul class="term__sponsors-list">
      <? foreach ($term->sponsors()->toStructure() as $sponsor) { ?>
        <li class="term__sponsor">
          <a class="term__sponsor-link" href="<?= $sponsor->link() ?>" target="_blank">
            <? snippet('blocks/responsive-image', ['image' => $term->image($sponsor->logo())]) ?>
          </a>
        </li>
      <? } ?>
    </ul>
  </div>

</div>

<? snippet('document/footer') ?>
