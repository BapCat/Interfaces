<?php namespace BapCat\Interfaces\Persist;

/**
 * Defines a directory in a presistent filesystem
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class File extends Path {
  /**
   * Gets the size of this file
   * 
   * @return  int  The size of the file
   */
  protected function getSize() {
    return $this->driver->size($this);
  }
}
