<?php

require_once __DIR__ . '/_mocks.php';

class FileOutputStreamTest extends PHPUnit_Framework_TestCase {
  public function testFileDoesntExist() {
    $this->setExpectedException('BapCat\Interfaces\Exceptions\PathNotFoundException');
    
    $driver = mockDriver($this, false);
    $file = mockFile($this, $driver, '');
    
    $out = mockFileOutputStream($this, $file);
  }
  
  public function testProperties() {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');
    
    $out = mockFileOutputStream($this, $file);
    
    $this->assertEquals($file, $out->file);
  }
  
  public function testWrite() {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');
    
    $out = mockFileOutputStream($this, $file);
    
    $this->assertEquals(10, $out->write('1234567890'));
  }
}