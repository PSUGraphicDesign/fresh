<? return function ($site, $pages, $page) {
  return [
    'archive' => $page,
    'years' => $page->years()->sortBy('title', 'desc')
  ];
};
