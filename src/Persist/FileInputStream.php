<?php namespace BapCat\Interfaces\Persist;

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use BapCat\Propifier\PropifierTrait;

abstract class FileInputStream {
  use PropifierTrait;
  
  private $file;
  
  public function __construct(File $file) {
    if(!$file->exists) {
      throw new PathNotFoundException($file);
    }
    
    $this->file = $file;
  }
  
  protected function getFile() {
    return $this->file;
  }
  
  protected abstract function getHasMore();
  public abstract function read($length = 0);
}
