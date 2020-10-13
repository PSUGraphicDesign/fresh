<?php snippet('document/header', [
  'useMenu' => 'current-term'
]) ?>

<div class="term">

  <div class="term__hero">
    <div class="term__hero-content">
      <?php snippet('blocks/responsive-image', ['image' => $term->hero()->toFile()]) ?>
    </div>
  </div>

  <div class="term__details">
    <ul class="term__details-items">
      <li class="term__details-item term__details-item--what">
        <h3 class="term__details-item--header "><?= $term->what_header() ?></h3>
        <div class="text-content">
          <?= $term->what()->kirbytext() ?>
        </div>
      </li>
      <li class="term__details-item term__details-item--when">
        <h3 class="term__details-item--header "><?= $term->when_header() ?></h3>
        <div class="text-content">
          <?= $term->when()->kirbytext() ?>
        </div>
      </li>
      <li class="term__details-item term__details-item--where">
        <h3 class="term__details-item--header "><?= $term->where_header() ?></h3>
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
      <a class="term__attend-button" href="<?= $term->ticket_link() ?>" target="_blank">Attend</a>
    </div>
  </div>

  <?php if ($grads->count()) { ?>
    <div class="term__grads" id="grads">
      <div class="term__grads-content">
        <h2 class="term__grads-header"><?= $term->grads_header() ?></h2>
        <?php snippet('blocks/grads-index', ['grads' => $grads]) ?>
      </div>
    </div>
  <?php } ?>

  <?php if ($sponsors->count()) { ?>
    <div class="term__sponsors">
      <h2 class="term__sponsors-header"><?= $term->sponsors_header() ?></h2>
      <ul class="term__sponsors-list">
        <?php foreach ($sponsors as $sponsor) { ?>
          <li class="term__sponsor">
            <a class="term__sponsor-link" href="<?= $sponsor->link() ?>" target="_blank">
              <?php snippet('blocks/responsive-image', ['image' => $term->image($sponsor->logo())]) ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>
</div>

<?php snippet('document/footer') ?>
