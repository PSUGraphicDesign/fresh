<div class="responsive-image js-responsive-image">
  <?php $imgAttrs = [
    'title' => $image->title()->html(),
    'class' => 'responsive-image__image js-responsive-image__image'
  ] ?>

  <?php if (isset($useSrcset) && $useSrcset) { ?>
    <?php $imgAttrs = array_merge($imgAttrs, Help::srcset_attrs_for($image, isset($options) ? $options : [])) ?>
  <?php } ?>

  <?php $imgUrl = $image->thumb(isset($options) ? $options : 'safe')->url() ?>

  <?php if (isset($isLazy) && $isLazy) { ?>
    <?php $imgAttrs = array_merge($imgAttrs, ['data-src' => $imgUrl, 'data-is-lazy' => 1]) ?>
  <?php } else { ?>
    <?php $imgAttrs = array_merge($imgAttrs, ['src' => $imgUrl]) ?>
  <?php } ?>

  <?= html::tag('img', $imgAttrs) ?>

  <?php if (isset($ratio) && $ratio) { ?>
    <?php # A custom ratio was passed: ?>
    <div class="responsive-image__shim responsive-image__shim--is-custom-ratio" style="padding-bottom: <?= (1 / $ratio) * 100 ?>%"></div>
  <?php } else if (isset($ratio) && $ratio === false) { ?>
    <?php # We should not set a ratio: ?>
    <div class="responsive-image__shim responsive-image__shim--is-without-ratio"></div>
  <?php } else { ?>
    <?php # Default behavior: ?>
    <div class="responsive-image__shim responsive-image__shim--is-auto-ratio" style="padding-bottom: <?= (1 / $image->ratio()) * 100 ?>%"></div>
  <?php } ?>
</div>
