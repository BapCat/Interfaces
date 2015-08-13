<?php namespace BapCat\Interfaces\Services;

/**
 * Defines a class that registers a service
 * 
 * @author    Corey Frenette
 * @copyright Copyright (c) 2015, BapCat
 */
interface ServiceProvider {
  /**
   * Register the service
   */
  public function register();
}
