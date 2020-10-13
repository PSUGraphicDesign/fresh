<?php kirby()->set('page::method', 'parentTitle', function ($p) {
  return $p->parent()->title();
});
