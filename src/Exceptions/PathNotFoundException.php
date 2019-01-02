<?php declare(strict_types = 1); namespace BapCat\Interfaces\Exceptions;

use BapCat\Interfaces\Persist\Path;

use Exception;

/**
 * A path (file or directory) could not be found
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
class PathNotFoundException extends Exception {
  /** @var  Path  $path  The path that could not be found */
  private $path;

  /**
   * @param  Path  $path  The path that could not be found
   */
  public function __construct(Path $path) {
    parent::__construct("[$path] does not exist.");
    $this->path = $path;
  }

  /**
   * Gets the path that could not be found
   *
   * @return  Path  The path that could not be found
   */
  public function getPath(): Path {
    return $this->path;
  }
}
