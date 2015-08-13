<?php namespace BapCat\Interfaces\Values;

use BapCat\Propifier\PropifierTrait;

/**
 * Defines a class that represents a complex type
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
abstract class Value {
  use PropifierTrait;
  
  /**
   * Gets the raw data from a value object
   */
  protected abstract function getRaw();
}
