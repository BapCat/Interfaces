<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

use DateTime;

/**
 * Defines a driver for a given persistent file storage medium
 * (eg. local filesystem, AWS, etc)
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class Driver {
  /**
   * Gets a file or directory from the storage medium
   *
   * @param  string  $path  The path of the file
   *
   * @return  File|Directory  Either a File or Directory, depending on the path's type
   */
  public function get(string $path) {
    if($this->isDir($path)) {
      return $this->instantiateDir($path);
    }

    return $this->instantiateFile($path);
  }

  /**
   * Creates a File representation of a path
   *
   * @param  string  $path  The path
   *
   * @return  File  An instance of File representing the path
   */
  protected abstract function instantiateFile(string $path): File;

  /**
   * Creates a Directory representation of a path
   *
   * @param  string  $path  The path
   *
   * @return  Directory  An instance of Directory representing the path
   */
  protected abstract function instantiateDir(string $path): Directory;

  /**
   * Checks if a path is a directory
   *
   * @param  string  $path  The Path to check
   *
   * @return  bool  True if the path is a directory, false otherwise
   */
  public abstract function isDir(string $path): bool;

  /**
   * Checks if a path is a file
   *
   * @param  string  $path  The Path to check
   *
   * @return  bool  True if the path is a file, false otherwise
   */
  public abstract function isFile(string $path): bool;

  /**
   * Checks if a path exists
   *
   * @param  Path  $path  The Path to check
   *
   * @return  bool  True if the path exists, false otherwise
   */
  public abstract function exists(Path $path): bool;

  /**
   * Checks if a path is a symlink
   *
   * @param  Path  $path  The Path to check
   *
   * @return  bool  True if the path is a symlink, false otherwise
   */
  public abstract function isLink(Path $path): bool;

  /**
   * Checks if a path is readable
   *
   * @param  Path  $path  The Path to check
   *
   * @return  bool  True if the path is readable, false otherwise
   */
  public abstract function isReadable(Path $path): bool;

  /**
   * Checks if a path is writable
   *
   * @param  Path  $path  The Path to check
   *
   * @return  bool  True if the path is writable, false otherwise
   */
  public abstract function isWritable(Path $path): bool;

  /**
   * Gets the size of a file
   *
   * @param  File  $file  The File to get the size of
   *
   * @return  int  The size of the file
   */
  public abstract function size(File $file): int;

  /**
   * Gets the time a Path was last modified
   *
   * @param  Path  $path  The Path to get the modified time of
   *
   * @return  DateTime  When the path was last modified
   */
  public abstract function modified(Path $path): DateTime;
}
