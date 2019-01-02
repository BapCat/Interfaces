<?php declare(strict_types = 1); namespace BapCat\Interfaces\Services;

/**
 * Defines a class that registers a service
 *
 * @author    Corey Frenette
 * @copyright Copyright (c) 2019, BapCat
 */
interface ServiceProvider {
  /**
   * Register the service
   *
   * @return  void
   */
  public function register(): void;
}
