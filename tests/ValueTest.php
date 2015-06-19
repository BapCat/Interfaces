<?php

require_once __DIR__ . '/stubs/StupidValue.php';

use BapCat\Interfaces\Values\Value;

class ValueTest extends PHPUnit_Framework_Testcase {
  public function testMagicProperties() {
    $str = 'This is a test';
    
    $value = new StupidValue($str);
    
    $this->assertEquals($str, $value->something);
    $value->something = 'test';
  }
  
  public function testGetDoesntExist() {
    $this->setExpectedException('Exception');
    $value = new StupidValue('');
    $test = $value->asdf;
  }
  
  public function testSetDoesntExist() {
    $this->setExpectedException('Exception');
    $value = new StupidValue('');
    $value->asdf = 'asdf';
  }
}
