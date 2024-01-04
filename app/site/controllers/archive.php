<?php return function ($site, $pages, $page) {
  # Just redirect to the most recent year with a non-current term:
  foreach ($page->years()->sortBy('title', 'desc') as $year) {
    foreach ($year->terms() as $term) {
      if (!$term->isCurrentTerm()) {
        return go($term);
      }
    }
  }
};
