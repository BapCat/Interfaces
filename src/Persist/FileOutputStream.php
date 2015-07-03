<?php namespace BapCat\Interfaces\Persist;

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use BapCat\Propifier\PropifierTrait;

abstract class FileOutputStream {
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
  
  public abstract function write($data);
}
