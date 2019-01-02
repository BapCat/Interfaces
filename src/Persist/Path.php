<?php declare(strict_types = 1); namespace BapCat\Interfaces\Persist;

use BapCat\Propifier\PropifierTrait;
use DateTime;

/**
 * Defines a basic element of a filesystem, which may be a file or directory
 *
 * @property-read  Driver    $driver
 * @property-read  string    $path
 * @property-read  string    $name
 * @property-read  bool      $exists
 * @property-read  bool      $is_link
 * @property-read  bool      $is_readable
 * @property-read  bool      $is_writable
 * @property-read  DateTime  $modified
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
abstract class Path {
  use PropifierTrait;

  /** @var  Driver  $driver  The filesystem driver */
  private $driver;

  /** @var  string  $path  The path of this file or directory */
  private $path;

  /** @var  string  $name  The name of this file or directory */
  private $name;

  /**
   * @param  Driver  $driver  The filesystem driver this file or directory belongs to
   * @param  string  $path    The path of this file or directory
   */
  public function __construct(Driver $driver, string $path) {
    $this->driver = $driver;
    $this->path   = $path;

    $this->name = basename($path);
  }

  /**
   * Gets a string representation of this file or directory to a
   *
   * @return  string  A string representation of this file or directory
   */
  public function __toString(): string {
    $class = basename(__CLASS__);
    return "{$class}[{$this->path}]";
  }

  /**
   * Gets the driver of this file or directory
   *
   * @return  Driver  The driver
   */
  protected function getDriver(): Driver {
    return $this->driver;
  }

  /**
   * Gets the path of this file or directory
   *
   * @return  string  The path
   */
  protected function getPath(): string {
    return $this->path;
  }

  /**
   * Gets the name of this file or directory
   *
   * @return  string  The name
   */
  protected function getName(): string {
    return $this->name;
  }

  /**
   * Checks if this file or directory exists
   *
   * @return  bool  True if the file or directory exists, false otherwise
   */
  protected function getExists(): bool {
    return $this->driver->exists($this);
  }

  /**
   * Checks if this file or directory is a symlink
   *
   * @return  bool  True if the file or directory is a symlink, false otherwise
   */
  protected function getIsLink(): bool {
    return $this->driver->isLink($this);
  }

  /**
   * Checks if this file or directory is readable
   *
   * @return  bool  True if the file or directory is readable, false otherwise
   */
  protected function getIsReadable(): bool {
    return $this->driver->isReadable($this);
  }

  /**
   * Checks if this file or directory is writable
   *
   * @return  bool  True if the file or directory is writable, false otherwise
   */
  protected function getIsWritable(): bool {
    return $this->driver->isWritable($this);
  }

  /**
   * Checks the last time this file or directory was modified
   *
   * @return  DateTime  The last modified time
   */
  protected function getModified(): DateTime {
    return $this->driver->modified($this);
  }
}
