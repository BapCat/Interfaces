<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use BapCat\Propifier\PropifierTrait;

/**
 * Defines a class capable of writing to a file
 *
 * @property-read  File  $file
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class FileOutputStream {
  use PropifierTrait;

  /**
   * @var  File  $file  The file to write to
   */
  private $file;

  /**
   * @param  File  $file  The file to write to
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
   * Gets the file this writer will write to
   *
   * @return  File  The file
   */
  protected function getFile(): File {
    return $this->file;
  }

  /**
   * Writes an arbitrary block of data to the file
   *
   * @param  mixed  $data  The data to write to the file
   */
  public abstract function write($data);
}
