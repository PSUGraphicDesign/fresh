<section class="menu menu--archive">
  <ul class="menu__breadcrumbs">
    <?php foreach ($page->parents()->flip() as $parent) { ?>
      <?php if ($parent->isHomePage()) continue; ?>

      <li class="menu__breadcrumb">
        <a class="menu__breadcrumb-link" href="<?= $parent->url() ?>"><?= $parent->title() ?></a>
      </li>
    <?php } ?>
  </ul>
  <ul class="menu__items">
    <li class="menu__item">
      <a class="menu__item-link" href="<?= url('/') ?>">View Current Term &rarr;</a>
    </li>
  </ul>
</section>
