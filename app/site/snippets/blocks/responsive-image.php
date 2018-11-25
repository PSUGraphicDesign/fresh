<div class="responsive-image js-responsive-image">
  <?= html::img($image->thumb(isset($options) ? $options : 'safe')->url(), array_merge([
    'title' => $image->title()->html(),
    'class' => 'responsive-image__image js-responsive-image__image'
  ], isset($useSrcset) && $useSrcset ? Help::srcset_attrs_for($image, isset($options) ? $options : []) : [])) ?>

  <? if (isset($ratio) && $ratio) { ?>
    <? # A custom ratio was passed: ?>
    <div class="responsive-image__shim responsive-image__shim--is-custom-ratio" style="padding-bottom: <?= (1 / $ratio) * 100 ?>%"></div>
  <? } else if (isset($ratio) && $ratio === false) { ?>
    <? # We should not set a ratio: ?>
    <div class="responsive-image__shim responsive-image__shim--is-without-ratio"></div>
  <? } else { ?>
    <? # Default behavior: ?>
    <div class="responsive-image__shim responsive-image__shim--is-auto-ratio" style="padding-bottom: <?= (1 / $image->ratio()) * 100 ?>%"></div>
  <? } ?>
</div>
