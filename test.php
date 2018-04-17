<?php
 class Meat
 {
   public $foodName;

   public function _construct(string $foodName)
   {$this->foodName = $foodName;
   }
 }

   class Vegan
   {
     public function eat(Vegetable $food)
     {
       print "C'est bon ".$food->foodName;

     }
   }

   $food = new Meat('un steak');
   $person = new Vegan();
   $person->eat($food);


 ?>
