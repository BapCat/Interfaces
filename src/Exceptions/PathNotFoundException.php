<?php namespace BapCat\Interfaces\Exceptions;

use BapCat\Interfaces\Persist\Path;

use Exception;

class PathNotFoundException extends Exception {
  private $path;
  
  public function __construct(Path $path) {
    parent::__construct("[{$path->path}] does not exist.");
    $this->path = $path;
  }
  
  public function getPath() {
    return $this->path;
  }
}
