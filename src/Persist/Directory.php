<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

/**
 * Defines a directory in a persistent filesystem
 *
 * @property-read  Path[]  $children
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class Directory extends Path {
  /**
   * Loads the children of this directory
   *
   * @return  Path[]  An array containing the children of this directory
   */
  protected abstract function loadChildren(): array;

  /**
   * Gets the children of this directory
   *
   * @return  Path[]  An array containing the children of this directory
   */
  protected function getChildren(): array {
    return $this->loadChildren();
  }

  /**
   * Gets a child of this directory
   *
   * @param  string  $name  The name of the child to get
   *
   * @return  Path  The child of this directory
   */
  protected function getChild(string $name): Path {
    return $this->driver->get($this->path . '/' . $name);
  }
}
