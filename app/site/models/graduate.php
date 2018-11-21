<? class GraduatePage extends Page {
  public function term () {
    return $this->parent();
  }

  public function isInCurrentTerm () {
    return site()->current_term()->toPage()->is($this->term());
  }
}
