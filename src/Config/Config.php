<?php namespace BapCat\Interfaces\Config;

/**
 * Defines a config class
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface Config {
  /**
   * Get the config value for the given name
   * 
   * @param  string $name The name of the config value to get
   * 
   * @return mixed  Either a config value, or a sub-instance of `Config`
   */
  public function __get($name);
}
