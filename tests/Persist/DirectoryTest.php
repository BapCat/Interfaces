<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/_mocks.php';

class DirectoryTest extends TestCase {
  public function testProperties(): void {
    $dirname = 'test';
    $driver = mockDriver($this);
    $dir = mockDir($this, $driver, $dirname);

    $this->assertEquals(['a', 'b'], $dir->children);
  }
}
