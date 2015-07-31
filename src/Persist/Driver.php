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
  
  public abstract function isDir($path);
  public abstract function isFile($path);
  
  public abstract function exists(Path $path);
  public abstract function isLink(Path $path);
  public abstract function isReadable(Path $path);
  public abstract function isWritable(Path $path);
  
  public abstract function size(File $file);
  
  public abstract function modified(Path $path);
}
