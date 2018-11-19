<? return function ($site, $pages, $page) {
  return [
    'term' => $page,
    'grads' => $page->grads()
  ];
};
