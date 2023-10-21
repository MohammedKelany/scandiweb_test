<?php

namespace App\classes;

use App\classes\Product;

class Furniture extends Product
{
    protected static $columns = ["id", "name", "sku", "price", "dimensions"];

    public function save()
    {
        $sql = "INSERT INTO products (";
        $sql .= join(", ", static::$columns);
        $sql .= ")";
        $sql .= " VALUES(";
        $sql .= join(", :", static::$columns);
        $sql .= ");";
        // var_dump($sql);
        // exit;
        $result = self::$database->prepare($sql);
        $this->parametersSanitiser($result);
        $result = $result->execute();
        if ($result) {
            header("Location: index.php");
        }
    }
    public function __construct($args = [])
    {
        $this->name = $args["name"] ?? "";
        $this->sku = $args["sku"] ?? "";
        $this->price = $args["price"] ?? "";
        $this->width = $args['width'] ?? '';
        $this->length = $args['length'] ?? '';
        $this->height = $args['height'] ?? '';
        $this->dimensions = $args['dimensions'] ?? '';
    }
}
