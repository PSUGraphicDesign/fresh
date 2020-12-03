<?php class TermPage extends Page {
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
