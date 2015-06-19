<?php

use BapCat\Interfaces\Values\Value;

class StupidValue extends Value {
  public function __construct($value) {
    parent::__construct($value);
  }
  
  protected function validate($value) {
    
  }
  
  protected function getSomething() {
    return $this->value();
  }
  
  protected function setSomething($val) {
    
  }
}
