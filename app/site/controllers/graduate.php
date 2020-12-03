<?php return function ($site, $pages, $page) {
  return [
    'term' => $page->term(),
  ];
};
