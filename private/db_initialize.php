<?php

use App\classes\Product;

require_once("db_credential.php");

$database = new PDO(DSN, DB_USERNAME, DB_PASSWORD);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $database->;
Product::setDatabase($database);
