<?php declare(strict_types = 1);

use BapCat\Interfaces\Persist\Directory;
use BapCat\Interfaces\Persist\File;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class DriverTest extends TestCase {
  public function testGetFile(): void {
    $filename = 'test';
    $driver = mockFileDriver($this, $filename);

    $dir = $driver->get($filename);

    $this->assertInstanceOf(File::class, $dir);
  }

  public function testGetDirectory(): void {
    $dirname = 'test';
    $driver = mockDirDriver($this, $dirname);

    $dir = $driver->get($dirname);

    $this->assertInstanceOf(Directory::class, $dir);
  }
}
