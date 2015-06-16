<?php namespace BapCat\Contract;

use BapCat\Interfaces\Ioc\Ioc;

interface ServiceProvider {
  public function register(Ioc $ioc);
}
