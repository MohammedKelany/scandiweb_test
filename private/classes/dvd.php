<?php

namespace App\classes;

use App\classes\Product;

class DVD extends Product
{
   protected static $columns = ["id", "name", "sku", "price", "size"];
   public function __construct($args = [])
   {
      $this->name = $args["name"] ?? "";
      $this->sku = $args["sku"] ?? "";
      $this->price = $args["price"] ?? "";
      $this->size = $args["size"] ?? "";
   }
}
