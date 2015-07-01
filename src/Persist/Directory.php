<?php namespace BapCat\Interfaces\Persist;

use ArrayIterator;
use IteratorAggregate;

abstract class Directory extends Path implements IteratorAggregate {
  protected abstract function loadChildren();
  
  protected function getChildren() {
    return $this->loadChildren();
  }
  
  public function getIterator() {
    return new ArrayIterator($this->loadChildren());
  }
}
