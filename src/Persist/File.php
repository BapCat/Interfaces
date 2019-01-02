<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

/**
 * Defines a file in a persistent filesystem
 *
 * @property-read  int  $size
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class File extends Path {
  /**
   * Gets the size of this file
   *
   * @return  int  The size of the file
   */
  protected function getSize(): int {
    return $this->driver->size($this);
  }

  /**
   * Caches a copy of this file on the local filesystem (if it isn't already)
   *
   * @return  File  A File instance that points to the local file
   */
  public abstract function makeLocal(): File;
}
