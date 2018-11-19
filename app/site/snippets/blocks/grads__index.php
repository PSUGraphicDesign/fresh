<ul class="grads__index">
  <? foreach ($grads as $grad) { ?>
    <li class="grads__grad">
      <a class="grads__grad-link" href="<?= $grad->url() ?>">
        <div class="grads__grad-media">
          <? if ($featuredImage = $grad->featured_photo()->toFile()) { ?>
            <div class="grads__grad-image grads__grad-image--primary">
              <? snippet('blocks/responsive-image', ['image' => $featuredImage, 'ratio' => false]) ?>
            </div>
          <? } ?>

          <? if ($altImage = $grad->alt_photo()->toFile()) { ?>
            <div class="grads__grad-image grads__grad-image--alternate">
              <? snippet('blocks/responsive-image', ['image' => $altImage, 'ratio' => false]) ?>
            </div>
          <? } ?>
        </div>

        <h3 class="grads__grad-name"><?= $grad->title() ?></h3>  
      </a>
    </li>
  <? } ?>
</ul>
