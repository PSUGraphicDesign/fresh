<?php return function ($site, $pages, $page) {
  # Just redirect to the most recent year:
  go($page->years()->sortBy('title', 'desc')->first());
};
