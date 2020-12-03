<?php return function ($site, $pages, $page) {
  $currentTerm = page($site->current_term());

  return [
    'term' => $currentTerm,
    'grads' => $currentTerm->grads(),
    'sponsors' => $currentTerm->sponsors()->toStructure(),
  ];
};
