<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class PathTest extends TestCase {
  public function testProperties(): void {
    $driver = mockDriver($this);
    $filename = 'test/a';

    $path = mockPath($this, $driver, $filename);

    $this->assertEquals($driver, $path->driver);
    $this->assertEquals($filename, $path->path);
    $this->assertEquals('a', $path->name);
    $this->assertTrue($path->exists);
    $this->assertTrue($path->is_link);
    $this->assertTrue($path->is_readable);
    $this->assertTrue($path->is_writable);
  }
}
