<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class FileTest extends TestCase {
  public function testProperties(): void {
    $filename = 'test';
    $driver = mockDriver($this);
    $file = mockFile($this, $driver, $filename);

    $this->assertEquals(100, $file->size);
  }
}
