<?php

require_once __DIR__ . '/_mocks.php';

class DriverTest extends PHPUnit_Framework_TestCase {
  public function testGetFile() {
    $filename = 'test';
    $driver = mockFileDriver($this, $filename);
    
    $dir = $driver->get($filename);
    
    $this->assertInstanceOf('BapCat\Interfaces\Persist\File', $dir);
  }
  
  public function testGetDirectory() {
    $dirname = 'test';
    $driver = mockDirDriver($this, $dirname);
    
    $dir = $driver->get($dirname);
    
    $this->assertInstanceOf('BapCat\Interfaces\Persist\Directory', $dir);
  }
}
