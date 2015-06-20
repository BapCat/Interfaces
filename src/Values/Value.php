<?php namespace BapCat\Interfaces\Values;

abstract class Value {
  private $value = null;
  
  public function __construct($value) {
    $this->validate($value);
    $this->value = $value;
  }
  
  protected abstract function validate($value);
  
  protected function value() {
    return $this->value;
  }
}
