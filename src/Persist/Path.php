<?php namespace BapCat\Interfaces\Persist;

use BapCat\Propifier\PropifierTrait;

abstract class Path {
  use PropifierTrait;
  
  private $driver;
  private $path;
  
  public function __construct(Driver $driver, $path) {
    $this->driver = $driver;
    $this->path   = $path;
  }
  
  protected function getExists() {
    return $this->driver->exists($this->path);
  }
  
  protected function getIsLink() {
    return $this->driver->isLink($this->path);
  }
  
  protected function getIsReadable() {
    return $this->driver->isReadable($this->path);
  }
  
  protected function getIsWritable() {
    return $this->driver->isWritable($this->path);
  }
}
