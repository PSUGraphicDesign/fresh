<? $img = html::img($image->thumb($options ?? 'safe')->url(), array_merge([
  'title' => $image->title()->html(),
  'class' => 'responsive-image__image js-responsive-image__image'
], isset($useSrcset) && $useSrcset ? Help::srcset_attrs_for($image, $options ?? []) : [])) ?>

<div class="responsive-image js-responsive-image">
  <? if (isset($ratio) && $ratio) { ?>
    <? # A custom ratio was passed: ?>
    <div class="responsive-image__shim responsive-image__shim--is-custom-ratio" style="padding-bottom: <?= (1 / $ratio) * 100 ?>%">
      <?= $img ?>
    </div>
  <? } else if (isset($ratio) && $ratio === false) { ?>
    <? # We should not set a ratio: ?>
    <div class="responsive-image__shim responsive-image__shim--is-without-ratio">
      <?= $img ?>
    </div>
  <? } else { ?>
    <? # Default behavior: ?>
    <div class="responsive-image__shim responsive-image__shim--is-auto-ratio" style="padding-bottom: <?= (1 / $image->ratio()) * 100 ?>%">
      <?= $img ?>
    </div>
  <? } ?>
</div>
