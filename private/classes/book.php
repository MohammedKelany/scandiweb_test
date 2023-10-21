<?php

namespace App\classes;

class Book extends Product
{
    protected static $columns = ["id", "name", "sku", "price", "weight_kg"];
    public function __construct($args = [])
    {
        $this->name = $args["name"] ?? "";
        $this->sku = $args["sku"] ?? "";
        $this->price = $args["price"] ?? "";
        $this->weight_kg = $args["weight_kg"] ?? "";
    }
}
