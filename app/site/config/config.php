<?

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
  ]
]);
