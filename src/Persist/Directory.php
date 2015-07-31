<?php namespace BapCat\Interfaces\Persist;

use ArrayIterator;
use IteratorAggregate;

abstract class Directory extends Path {
  protected abstract function loadChildren();
  
  protected function getChildren() {
    return $this->loadChildren();
  }
  
  protected function getChild($name) {
    return $this->driver->get($this->path . '/' . $name);
  }
}
