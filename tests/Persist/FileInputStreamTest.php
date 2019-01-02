<?php declare(strict_types = 1);

use BapCat\Interfaces\Exceptions\PathNotFoundException;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class FileInputStreamTest extends TestCase {
  public function testFileDoesntExist(): void {
    $this->expectException(PathNotFoundException::class);

    $driver = mockDriver($this, false);
    $file = mockFile($this, $driver, '');

    mockFileInputStream($this, $file, 100);
  }

  public function testProperties(): void {
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, '');

    $in = mockFileInputStream($this, $file, 100);

    $this->assertEquals($file, $in->file);
    $this->assertTrue($in->has_more);

    $in = mockFileInputStream($this, $file, 0);
    $this->assertFalse($in->has_more);
  }

  public function testRead(): void {
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
