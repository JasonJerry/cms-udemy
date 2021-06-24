<?php

class Adobe 
{
    
    public $premier = "Premier"; // can be used anywhere
    protected $photoshop = "Photoshop";// only available inside class or sub-classes or methods
    private $illustrator = "Illustrator"; // Only available inside the class
    
    var $aftereffects = "After Effects";
    function showAdobe()
    {
      echo $this->premier . " Public Inside Adobe Class <br> ";
      echo $this->photoshop . " Protected Inside Adobe Class<br>";
      echo $this->illustrator . " Private Inside Adobe Class<br>";
  
    } 
}

class Magento extends Adobe 
{
    
      function showMagento()
      {
        echo $this->premier . " Public  inside Magento Class<br>"; 
        echo $this->photoshop . " Protected  inside Magento Class <br>";
        echo $this->illustrator . " private  inside Magento Class <br>"; //private not access outside class ERROR
      } 

}


$adobe = new Adobe();
$magento = new Magento();

echo $adobe->showAdobe(); //calling adobe class
echo $magento->showMagento(); //calling magento class
echo $magento->premier . " Public  Outside all class" ;
echo $magento->photoshop . " protected  Outside all class" ;   // ERROR cannot call protected outside class

//echo $semi->showProperty1(); //protected

// class Adobe {
  
//   public $name;
  
//   public function run() {
//       echo $this->name. " is runing...<br/>";
//   }
  
//   public function working() {
//       echo $this->name. " is working...<br/>";
//   }
// }


// class Magento extends Adobe {
 
// }


// class MagentoOpenSource extends Adobe {
 
// }

// $Magento = new Magento();
// $Magento->name = "Magento";

// $MagentoOpenSource = new MagentoOpenSource();
// $MagentoOpenSource->name = "Adobe Commerce";

// $MagentoOpenSource->run();
// $Magento->working();
?>