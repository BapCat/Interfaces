<?php declare(strict_types = 1);

use BapCat\Interfaces\Persist\Directory;
use BapCat\Interfaces\Persist\Path;
use BapCat\Interfaces\Persist\FileInputStream;
use BapCat\Interfaces\Persist\FileOutputStream;
use BapCat\Interfaces\Persist\Driver;
use BapCat\Interfaces\Persist\File;
use PHPUnit\Framework\TestCase;

function mockFileDriver(TestCase $testcase, $filename): Driver {
  $driver = mockDriver($testcase);
  $file = mockFile($testcase, $driver, $filename);

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

function mockDirDriver(TestCase $testcase, $filename): Driver {
  $driver = mockDriver($testcase);
  $dir = mockDir($testcase, $driver, $filename);

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

function mockDriver(TestCase $testcase, $exists = true): Driver {
  $driver = $testcase
    ->getMockBuilder(Driver::class)
    ->setMethods(['exists', 'size', 'isLink', 'isReadable', 'isWritable'])
    ->getMockForAbstractClass();

  $driver
    ->method('exists')
    ->willReturn($exists);

  $driver
    ->method('size')
    ->willReturn(100);

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

function mockPath(TestCase $testcase, Driver $driver, $filename): Path {
  return $testcase->getMockBuilder(Path::class)->setConstructorArgs([$driver, $filename])->getMockForAbstractClass();
}

function mockFile(TestCase $testcase, Driver $driver, $filename): File {
  return $testcase->getMockBuilder(File::class)->setConstructorArgs([$driver, $filename])->getMockForAbstractClass();
}

function mockDir(TestCase $testcase, Driver $driver, $filename): Directory {
  $dir = $testcase->getMockBuilder(Directory::class)
    ->setConstructorArgs([$driver, $filename])
    ->setMethods(['loadChildren'])
    ->getMockForAbstractClass();

  $dir
    ->method('loadChildren')
    ->willReturn(['a', 'b']);

  return $dir;
}

function mockFileInputStream(TestCase $testcase, File $file, $length): FileInputStream {
  $in = $testcase->getMockBuilder(FileInputStream::class)
    ->setConstructorArgs([$file])
    ->setMethods(['getHasMore', 'read'])
    ->getMockForAbstractClass();

  $remaining = $length;

  $in
    ->method('getHasMore')
    ->will($testcase->returnCallback(function() use(&$remaining) {
      return $remaining > 0;
    }));

  $in
    ->method('read')
    ->will($testcase->returnCallback(function($length = 0) use(&$remaining) {
      $remaining -= $length;
      return random_bytes($length);
    }));

  return $in;
}

function mockFileOutputStream(TestCase $testcase, File $file): FileOutputStream {
  $in = $testcase->getMockBuilder(FileOutputStream::class)
    ->setConstructorArgs([$file])
    ->setMethods(['write'])
    ->getMockForAbstractClass();

  $in
    ->method('write')
    ->will($testcase->returnCallback(function($data) {
      return strlen($data);
    }));

  return $in;
}
