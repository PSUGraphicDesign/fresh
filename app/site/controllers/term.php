<?php return function ($site, $pages, $page) {
  if ($page->isCurrentTerm()) {
    return go('/');
  }

  return [
    'archive' => page('archive'),
    'grads' => $page->grads(),
    'sponsors' => $page->sponsors()->toStructure(),
  ];
};
