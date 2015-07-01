<?php namespace BapCat\Interfaces\Persist;

//@TODO should use a value object
abstract class Driver {
  public function get($path) {
    if($this->isDir($path)) {
      return $this->instantiateDir($path);
    }
    
    return $this->instantiateFile($path);
  }
  
  protected abstract function instantiateFile($path);
  protected abstract function instantiateDir($path);
  
  public abstract function exists($path);
  public abstract function isDir($path);
  public abstract function isFile($path);
  public abstract function isLink($path);
  public abstract function isReadable($path);
  public abstract function isWritable($path);
}
