<?php namespace BapCat\Interfaces\Persist;

abstract class File extends Path {
  protected function getSize() {
    return $this->driver->size($this);
  }
}
