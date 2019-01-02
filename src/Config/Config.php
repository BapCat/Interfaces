<?php declare(strict_types = 1); namespace BapCat\Interfaces\Config;

/**
 * Defines a config class
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
interface Config {
  /**
   * Get the config value for the given name
   *
   * @param  string  $name  The name of the config value to get
   *
   * @return  mixed  Either a config value, or a sub-instance of `Config`
   */
  public function __get(string $name);
}
