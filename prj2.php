<?php

// Inheritance with access modifier
class Adobe {
  public $name;
  public $color;
  public function __construct($name, $color) { //construcotr
    $this->name = $name;
    $this->color = $color;
  }
  protected function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

class Magento extends Adobe {
  public function message() {
    echo "Am I a fruit or a berry? ";
  }
}

// Try to call all three methods from outside class
$Magento = new Magento("Magento", 2.4);  // OK. __construct() is public
$Magento->message(); // OK. message() is public


try {
    throw new Exception("An error occurred");
  } catch(Exception $Magento) {
    echo $Magento->getMessage();
  }
// $strawberry->intro();  ERROR. intro() is protected
?>