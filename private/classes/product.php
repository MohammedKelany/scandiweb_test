<?php

namespace App\classes;

use PDO;
use PDOStatement;

class Product
{
    protected static PDO $database;
    protected static $columns = [];
    public static function setDatabase($database)
    {
        self::$database = $database;
    }

    public static function selectAll()
    {
        $sql = "SELECT * FROM products";
        $result = self::$database->prepare($sql);
        $result->execute();
        if (!$result) {
            exit("Error while getting data");
        }

        $allProducts = $result->fetchAll(PDO::FETCH_CLASS, self::class);
        return $allProducts;
    }

    public function parametersSanitiser(PDOStatement $result)
    {
        foreach (static::$columns as $param) {
            if ($param == "id") {
                continue;
            }
            $result->bindValue(":" . $param, $this->$param, PDO::PARAM_STR);
        }
    }
    public function save()
    {
        $sql = "INSERT INTO products (";
        $sql .= join(", ", static::$columns);
        $sql .= " ) ";
        $sql .= "VALUES(";
        $sql .= join(", :", static::$columns);
        $sql .= ");";
        $result = self::$database->prepare($sql);
        $this->parametersSanitiser($result);
        $result = $result->execute();
        if ($result) {
            header("Location: index.php");
        }
    }
    public static function delete()
    {
        $selectedId = $_POST["deleteId"];
        $extractedId = implode(',', $selectedId);
        $sql = "DELETE FROM products WHERE id IN($extractedId)";
        $result = self::$database->prepare($sql);
        $result->execute();
        if ($result) {
            header("Location: index.php");
        }
    }

    public $id;
    public $sku;
    public $name;
    public $price = 0.0;
    public $weight_kg = 0.0;
    public $size = 0;
    public $width = 0;
    public $length = 0;
    public $height = 0;
    public $dimensions = '';
}
