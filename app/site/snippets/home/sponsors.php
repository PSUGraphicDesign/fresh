<div class="sponsors">
  <ul class="sponsors__items">
    <? foreach ($page->sponsors()->toStructure() as $sponsor) { ?>
      <li class="sponsors__item">
        <a href="<?= $sponsor->link() ?>"><?= $sponsor->name() ?></a>
      </li>
    <? } ?>
  </ul>
</div>
