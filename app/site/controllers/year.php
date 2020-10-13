<?php return function ($site, $pages, $page) {
  return [
    'grads' => $page->grads(),
    'archive' => page('archive'),
  ];
};
