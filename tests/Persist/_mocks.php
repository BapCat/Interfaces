<?php

use BapCat\Interfaces\Persist\Driver;

function mockFileDriver(PHPUnit_Framework_TestCase $testcase) {
  $driver = mockDriver($testcase);
  $file = mockFile($testcase);
  
  $driver
    ->method('isFile')
    ->willReturn(true);
  
  $driver
    ->method('isDir')
    ->willReturn(false);
  
  $driver
    ->method('instantiateFile')
    ->willReturn($file);
  
  return $driver;
}

function mockDirDriver(PHPUnit_Framework_TestCase $testcase) {
  $driver = mockDriver($testcase);
  $dir = mockDir($testcase);
  
  $driver
    ->method('isFile')
    ->willReturn(false);
  
  $driver
    ->method('isDir')
    ->willReturn(true);
  
  $driver
    ->method('instantiateDir')
    ->willReturn($dir);
  
  return $driver;
}

function mockDriver(PHPUnit_Framework_TestCase $testcase) {
  $driver =  $testcase->getMockBuilder('BapCat\Interfaces\Persist\Driver')
    ->getMockForAbstractClass();
  
  $driver
    ->method('exists')
    ->willReturn(true);
  
  $driver
    ->method('isLink')
    ->willReturn(true);
  
  $driver
    ->method('isReadable')
    ->willReturn(true);
  
  $driver
    ->method('isWritable')
    ->willReturn(true);
  
  return $driver;
}

function mockPath(PHPUnit_Framework_TestCase $testcase, Driver $driver) {
  $path = $testcase->getMockForAbstractClass(
    'BapCat\Interfaces\Persist\Path',
    [
      $driver,
      ''
    ]
  );
  
  return $path;
}

function mockFile(PHPUnit_Framework_TestCase $testcase) {
  $file = $testcase->getMockBuilder('BapCat\Interfaces\Persist\File')
    ->disableOriginalConstructor()
    ->getMockForAbstractClass();
  
  return $file;
}

function mockDir(PHPUnit_Framework_TestCase $testcase) {
  $dir = $testcase->getMockBuilder('BapCat\Interfaces\Persist\Directory')
    ->disableOriginalConstructor()
    ->getMockForAbstractClass();
  
  $dir
    ->method('loadChildren')
    ->willReturn([]);
  
  return $dir;
}
