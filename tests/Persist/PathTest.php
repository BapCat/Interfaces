<?php

require_once __DIR__ . '/_mocks.php';

use BapCat\Interfaces\Persist\Driver;

class PathTest extends PHPUnit_Framework_TestCase {
  public function testGetFile() {
    $driver = mockDriver($this);
    
    $path = mockPath($this, $driver);
    
    $this->assertTrue($path->exists);
    $this->assertTrue($path->is_link);
    $this->assertTrue($path->is_readable);
    $this->assertTrue($path->is_writable);
  }
}
