<?php return function ($site, $pages, $page) {
  if (!$page->isCurrentTerm()) {
    return go(url::build([
      'hash' => "term-{$page->uid()}"
    ], $page->year()->url()));
  }

  return [
    'term' => $page,
    'grads' => $page->grads(),
    'sponsors' => $page->sponsors()->toStructure()
  ];
};
