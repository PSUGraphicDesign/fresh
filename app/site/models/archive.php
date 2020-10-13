<?php class ArchivePage extends Page {
  public function years () {
    return $this->children();
  }
}
