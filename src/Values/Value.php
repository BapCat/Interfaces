<?php namespace BapCat\Interfaces\Values;

abstract class Value {
  private $value = null;
  
  protected function __construct($value) {
    $this->value = $value;
  }
  
  public function value() {
    return $this->value;
  }
}
