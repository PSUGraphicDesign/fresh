<!DOCTYPE html>
<html class="root" lang="en">
  <head>
    <? snippet('util/document') ?>
    <? snippet('util/meta') ?>

    <? $stylesheets = [Help::versioned_asset_url('css', 'app.css')] ?>

    <? if (isset($page)) { ?>
      <? if ($page->intendedTemplate() == 'term') { ?>
        <? $stylesheetSource = $page ?>
      <? } else if ($page->intendedTemplate() == 'graduate') { ?>
        <? $stylesheetSource = $page->parent() ?>
      <? } ?>

      <? foreach ($stylesheetSource->files()->filterBy('extension', 'css') as $stylesheet) $stylesheets[] = $stylesheet->url() ?>
    <? } ?>

    <?= css($stylesheets) ?>

    <? c::get('env') == 'production' ? snippet('util/analytics') : null ?>
  </head>
  <body class="<?= Help::body_classes() ?>" data-action="<?= isset($page) ? $page->template() : "default" ?>">
    <header class="document__header">
      <? snippet('blocks/menu') ?>
    </header>

    <main class="document__content">
