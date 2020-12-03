<!DOCTYPE html>
<html class="root" lang="en">
  <head>
    <?php snippet('util/document') ?>
    <?php snippet('util/meta', ['customTitle' => $customTitle ?? null]) ?>

    <?php $stylesheets = [
      Help::versioned_asset_url('css', 'app.css')
    ] ?>
    <?= css($stylesheets) ?>
    <?php if (isset($term) && $term->isCurrentTerm()) { ?>
      <?php if ($term->stylesheet()->isNotEmpty()) { ?>
        <style><?= $term->stylesheet()->html() ?></style>
      <?php } ?>
    <?php } ?>

    <?php c::get('env') == 'production' ? snippet('util/analytics') : null ?>
  </head>

  <body class="<?= Help::body_classes(isset($page) ? $page : null, isset($bodyClasses) ? $bodyClasses : []) ?>" data-action="<?= isset($page) ? $page->template() : "default" ?>">
    <header class="document__header js-document__header">
      <?php if (isset($useMenu)) { ?>
        <?php snippet("blocks/menu--{$useMenu}") ?>
      <?php } ?>
    </header>

    <main class="document__content js-document__content">
