<div class="details">
  <ul class="details__items">
    <li class="details__item details__item--what">
      <?= $page->what()->kirbytext() ?>
    </li>
    <li class="details__item details__item--when">
      <?= $page->when()->kirbytext() ?>
    </li>
    <li class="details__item details__item--where">
      <?= $page->where()->kirbytext() ?>
    </li>
  </ul>
</div>
