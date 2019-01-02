<?php declare(strict_types = 1);

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class FileOutputStreamTest extends TestCase {
  public function testFileDoesntExist(): void {
    $this->expectException(PathNotFoundException::class);

    $driver = mockDriver($this, false);
    $file = mockFile($this, $driver, '');

    mockFileOutputStream($this, $file);
  }

  public function testProperties(): void {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');

    $out = mockFileOutputStream($this, $file);

    $this->assertEquals($file, $out->file);
  }

  public function testWrite(): void {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');

    $out = mockFileOutputStream($this, $file);

    $this->assertEquals(10, $out->write('1234567890'));
  }
}
