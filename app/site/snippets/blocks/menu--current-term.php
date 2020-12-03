<section class="menu menu--current-term">
  <ul class="menu__items">
    <li class="menu__item menu__item--attend">
      <a class="menu__item-link menu__item-link--attend" href="<?= $term->ticket_link() ?>" target="_blank">Attend</a>
    </li>
    <li class="menu__item menu__item--home">
      <a class="menu__item-link menu__item-link--home" href="<?= url('/') ?>">
        <?php if ($term->termLogo()) { ?>
          <?php snippet('blocks/responsive-image', ['image' => $term->termLogo()]) ?>
        <?php } else { ?>
          Home
        <?php } ?>
      </a>
    </li>
    <li class="menu__item menu__item--grads">
      <a class="menu__item-link menu__item-link--grads" href="#grads">Grads</a>
    </li>
  </ul>
</section>
