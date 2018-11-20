<section class="menu">
  <ul class="menu__items">
    <li class="menu__item menu__item--attend">
      <a class="menu__item-link" href="<?= page($site->current_term())->ticket_link() ?>" target="_blank">Attend</a>
    </li>
    <li class="menu__item menu__item--home">
      <a class="menu__item-link" href="<?= url('/') ?>">Home</a>
    </li>
    <li class="menu__item menu__item--grads">
      <a class="menu__item-link" href="#grads">Grads</a>
    </li>
  </ul>
</section>
