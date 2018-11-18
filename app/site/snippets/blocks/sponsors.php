<div class="sponsors">
  <ul class="sponsors__items">
    <? foreach ($page->sponsors()->toStructure() as $sponsor) { ?>
      <li class="sponsors__item">
        <a class="sponsors__link" href="<?= $sponsor->link() ?>" target="_blank"><? snippet('util/responsive-image', [
              'image' => $page->image($sponsor->logo())
            ]) ?></a>
      </li>
    <? } ?>
  </ul>
</div>
