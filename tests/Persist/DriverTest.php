<?php

require_once __DIR__ . '/_mocks.php';

use BapCat\Interfaces\Persist\Driver;

class DriverTest extends PHPUnit_Framework_TestCase {
  public function testGetFile() {
    $driver = mockFileDriver($this);
    
    $dir = $driver->get('Test');
    
    $this->assertInstanceOf('BapCat\Interfaces\Persist\File', $dir);
  }
  
  public function testGetDirectory() {
    $driver = mockDirDriver($this);
    
    $dir = $driver->get('Test');
    
    $this->assertInstanceOf('BapCat\Interfaces\Persist\Directory', $dir);
  }
}
