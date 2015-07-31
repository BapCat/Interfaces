<?php namespace BapCat\Interfaces\Persist;

use BapCat\Propifier\PropifierTrait;

abstract class Path {
  use PropifierTrait;
  
  private $driver;
  private $path;
  private $name;
  
  public function __construct(Driver $driver, $path) {
    $this->driver = $driver;
    $this->path   = $path;
    
    $this->name = basename($path);
  }
  
  public function __toString() {
    $class = basename(get_class());
    return "{$class}[{$this->path}]";
  }
  
  protected function getDriver() {
    return $this->driver;
  }
  
  protected function getPath() {
    return $this->path;
  }
  
  protected function getName() {
    return $this->name;
  }
  
  protected function getExists() {
    return $this->driver->exists($this);
  }
  
  protected function getIsLink() {
    return $this->driver->isLink($this);
  }
  
  protected function getIsReadable() {
    return $this->driver->isReadable($this);
  }
  
  protected function getIsWritable() {
    return $this->driver->isWritable($this);
  }
  
  protected function getModified() {
    return $this->driver->modified($this);
  }
}
