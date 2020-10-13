<?php return function ($site, $pages, $page) {
  if (!$page->isCurrentTerm()) {
    go(url::build([
      'hash' => "{$page->year()->uid()}-{$page->uid()}"
    ], page('archive')->url()));
  }

  return [
    'term' => $page,
    'grads' => $page->grads(),
    'sponsors' => $page->sponsors()->toStructure()
  ];
};
