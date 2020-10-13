<div class="grads-index">
  <ul class="grads-index__grads">
    <?php foreach ($grads as $grad) { ?>
      <li class="grads-index__grad">
        <a class="grads-index__grad-link" href="<?= $grad->url() ?>">
          <div class="grads-index__grad-media">
            <?php if ($featuredImage = $grad->featured_photo()->toFile()) { ?>
              <div class="grads-index__grad-image grads-index__grad-image--primary">
                <?php snippet('blocks/responsive-image', ['image' => $featuredImage, 'ratio' => false, 'isLazy' => true]) ?>
              </div>
            <?php } ?>

            <?php if ($altImage = $grad->alt_photo()->toFile()) { ?>
              <div class="grads-index__grad-image grads-index__grad-image--alternate">
                <?php snippet('blocks/responsive-image', ['image' => $altImage, 'ratio' => false, 'isLazy' => true]) ?>
              </div>
            <?php } ?>
          </div>

          <h3 class="grads-index__grad-name"><?= $grad->title() ?></h3>  
        </a>
      </li>
    <?php } ?>
  </ul>
</div>
