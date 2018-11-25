<? class TermPage extends Page {
  public function title () {
    // Term titles should include their year!
    return join(' ', [parent::title(), $this->year()->title()]);
  }

  public function year () {
    return $this->parent();
  }

  public function grads () {
    return $this->children()->visible();
  }

  public function isCurrentTerm () {
    return site()->current_term() == $this->uri();
  }

  public function termLogo () {
    return $this->logo()->toFile();
  }
}
