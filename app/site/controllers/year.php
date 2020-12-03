<?php return function ($site, $pages, $page) {
  // Redirect to the first term we find that *isn't* the current one.
  foreach ($page->children()->sortBy('sort') as $term) {
    if (!$term->isCurrentTerm()) {
      return go($term);
    }
  }

  return [
    'archive' => page('archive'),
  ];
};
