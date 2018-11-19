<div class="grads-index">
  <ul class="grads-index__grads">
    <? foreach ($grads as $grad) { ?>
      <li class="grads-index__grad">
        <a class="grads-index__grad-link" href="<?= $grad->url() ?>">
          <div class="grads-index__grad-media">
            <? if ($featuredImage = $grad->featured_photo()->toFile()) { ?>
              <div class="grads-index__grad-image grads-index__grad-image--primary">
                <? snippet('blocks/responsive-image', ['image' => $featuredImage, 'ratio' => false]) ?>
              </div>
            <? } ?>

            <? if ($altImage = $grad->alt_photo()->toFile()) { ?>
              <div class="grads-index__grad-image grads-index__grad-image--alternate">
                <? snippet('blocks/responsive-image', ['image' => $altImage, 'ratio' => false]) ?>
              </div>
            <? } ?>
          </div>

          <h3 class="grads-index__grad-name"><?= $grad->title() ?></h3>  
        </a>
      </li>
    <? } ?>
  </ul>
</div>
