<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use BapCat\Propifier\PropifierTrait;

/**
 * Defines a class capable of reading from a file
 *
 * @property-read  File  $file
 * @property-read  bool  $has_more
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class FileInputStream {
  use PropifierTrait;

  /** @var  File  $file  The file to read from */
  private $file;

  /**
   * @param  File  $file  The file to read from
   *
   * @throws  PathNotFoundException
   */
  public function __construct(File $file) {
    if(!$file->exists) {
      throw new PathNotFoundException($file);
    }

    $this->file = $file;
  }

  /**
   * Gets the file this reader will read from
   *
   * @return  File  The file
   */
  protected function getFile(): File {
    return $this->file;
  }

  /**
   * Checks if the file has data left that hasn't been read yet
   *
   * @return  bool  True if there is more data in the file, false otherwise
   */
  protected abstract function getHasMore(): bool;

  /**
   * Reads an arbitrary block of data from the file
   *
   * @param  int  $length  The amount of data to read from the file
   *
   * @return  string  The data read from the file
   */
  public abstract function read(int $length = 0): string;
}
