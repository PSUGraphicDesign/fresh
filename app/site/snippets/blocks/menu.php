<section class="menu">
  <ul class="menu__items">
    <li class="menu__item menu__item--attend">
      <a href="<?= page($site->current_term())->ticket_link() ?>" target="_blank">Attend</a>
    </li>
    <li class="menu__item menu__item--home">
      <a href="<?= url('/') ?>">Home</a>
    </li>
    <li class="menu__item menu__item--grads">
      <a href="#grads">Grads</a>
    </li>
  </ul>
</section>
