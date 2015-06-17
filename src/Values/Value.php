<?php namespace BapCat\Interfaces\Values;

abstract class Value {
  private $value = null;
  
  public function __construct($value) {
    $this->validate($value);
    $this->value = $value;
  }
  
  public function value() {
    return $this->value;
  }
  
  protected abstract function validate($value);
}
