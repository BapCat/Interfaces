<?php

require_once __DIR__ . '/_mocks.php';

class FileInputStreamTest extends PHPUnit_Framework_TestCase {
  public function testFileDoesntExist() {
    $this->setExpectedException('BapCat\Interfaces\Exceptions\PathNotFoundException');
    
    $driver = mockDriver($this, false);
    $file = mockFile($this, $driver, '');
    
    $in = mockFileInputStream($this, $file, 100);
  }
  
  public function testProperties() {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');
    
    $in = mockFileInputStream($this, $file, 100);
    
    $this->assertEquals($file, $in->file);
    $this->assertTrue($in->has_more);
    
    $in = mockFileInputStream($this, $file, 0);
    $this->assertFalse($in->has_more);
  }
  
  public function testRead() {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');
    
    $in = mockFileInputStream($this, $file, 100);
    
    $this->assertTrue($in->has_more);
    $this->assertEquals(50, strlen($in->read(50)));
    $this->assertTrue($in->has_more);
    $this->assertEquals(50, strlen($in->read(50)));
    $this->assertFalse($in->has_more);
  }
}
