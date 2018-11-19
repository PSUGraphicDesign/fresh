<? snippet('document/header') ?>

<div class="hero">
  <div class="hero__content">
    <? snippet('blocks/responsive-image', ['image' => $term->hero()->toFile()]) ?>
  </div>
</div>

<div class="details">
  <ul class="details__items">
    <li class="details__item details__item--what">
      <div class="text-content">
        <?= $term->what()->kirbytext() ?>
      </div>
    </li>
    <li class="details__item details__item--when">
      <div class="text-content">
        <?= $term->when()->kirbytext() ?>
      </div>
    </li>
    <li class="details__item details__item--where">
      <div class="text-content">
        <?= $term->where()->kirbytext() ?>
      </div>
    </li>
  </ul>
</div>


<div class="about">
  <div class="about__content">
    <div class="about__message">
      <div class="text-content">
        <?= $term->about()->kirbytext() ?>
      </div>
    </div>
  </div>
</div>

<div class="grads" id="grads">
  <div class="grads__content">
    <h2 class="grads__header"><?= $term->grads_header() ?></h2>
    <? snippet('blocks/grads__index', ['grads' => $term->grads()]) ?>
  </div>
</div>

<div class="sponsors">
  <h2 class="sponsors__header"><?= $term->sponsors_header() ?></h2>
  <ul class="sponsors__items">
    <? foreach ($term->sponsors()->toStructure() as $sponsor) { ?>
      <li class="sponsors__item">
        <a class="sponsors__link" href="<?= $sponsor->link() ?>" target="_blank"><? snippet('blocks/responsive-image', [
              'image' => $term->image($sponsor->logo())
            ]) ?></a>
      </li>
    <? } ?>
  </ul>
</div>

<? snippet('document/footer') ?>
