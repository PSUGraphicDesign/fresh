<?
c::set('debug', true);

# Multi-lang is enabled, by default:
c::set('languages', [
  [
    'code'    => 'en',
    'name'    => 'English',
    'default' => true,
    'locale'  => 'en_US',
    'url'     => '/',
  ]
]);

# Custom thumbnail definitions:
c::set('thumbs.presets', [
  'safe' => [
    'width' => 2880,
    'quality' => 50
  ],
  'thumbnail' => [
    'width' => 1000,
    'quality' => 50
  ]
]);

# Custom Routes
c::set('routes', [
  [
    'pattern' => '/',
    'action'  => function () { return page(site()->current_term()); }
  ]
]);

c::set('panel.stylesheet', 'assets/kirby/panel.css');
