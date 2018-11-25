<!DOCTYPE html>
<html class="root" lang="en">
  <head>
    <? snippet('util/document') ?>
    <? snippet('util/meta') ?>

    <? $stylesheets = [Help::versioned_asset_url('css', 'app.css')] ?>

    <? if (isset($page)) { ?>
      <? if ($page->intendedTemplate() == 'graduate') { ?>
        <? $stylesheetSource = $page->parent() ?>
      <? } else { ?>
        <? $stylesheetSource = $page ?>
      <? } ?>

      <? foreach ($stylesheetSource->files()->filterBy('extension', 'css') as $stylesheet) { ?>
        <? $stylesheets[] = url::build([
          'query' => ['mtime' => $stylesheet->modified()]
        ], $stylesheet->url()) ?>
      <? } ?>
    <? } ?>

    <?= css($stylesheets) ?>

    <? c::get('env') == 'production' ? snippet('util/analytics') : null ?>
  </head>

  <body class="<?= Help::body_classes(isset($page) ? $page : null, isset($bodyClasses) ? $bodyClasses : []) ?>" data-action="<?= isset($page) ? $page->template() : "default" ?>">
    <header class="document__header js-document__header">
      <? if (isset($useMenu)) { ?>
        <? snippet("blocks/menu--{$useMenu}") ?>
      <? } ?>
    </header>

    <main class="document__content js-document__content">
