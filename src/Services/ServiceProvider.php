<?php namespace BapCat\Interfaces\Services;

use BapCat\Interfaces\Ioc\Ioc;

interface ServiceProvider {
  public function register(Ioc $ioc);
}
