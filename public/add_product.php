<?php

use App\classes\Book;
use App\classes\DVD;
use App\classes\Furniture;

include_once(__DIR__ . '/../vendor/autoload.php');
include_once(__DIR__ . '/../private/db_initialize.php');
include(__DIR__ . '/../private/helper_functions.php');

$errors = validateInputs();

if (isset($_POST["submit"]) && empty($errors)) {
    $args = [];
    $result = false;
    $args["sku"] = $_POST["sku"] ?? null;
    $args["name"] = $_POST["name"] ?? null;
    $args["price"] = $_POST["price"] ?? null;
    $args["size"] = $_POST["size"] ?? null;
    $args["weight_kg"] = $_POST["weight_kg"] ?? null;
    $args["width"] = $_POST["width"] ?? null;
    $args["height"] = $_POST["height"] ?? null;
    $args["length"] = $_POST["length"] ?? null;

    if ($_POST["weight_kg"] != null) {
        $book = new Book($args);
        $result = $book->save();
    }

    if ($_POST["size"] != null) {
        $dvd = new DVD($args);
        $result = $dvd->save();
    }

    if ($_POST["width"] != null && $_POST["height"] != null && $_POST["length"] != null) {
        $args["dimensions"] = $_POST["height"] . "x" . $_POST["width"] . "x" . $_POST["length"];
        $furniture = new Furniture($args);
        $result = $furniture->save();
    }
}
?>

<!-- Have different page title for each page -->
<?php $pageTitle = "Add Product"; ?>
<?php include_once(__DIR__ . "/../private/shared/header.php"); ?>

<body>
    <div class="flex-wrapper">
        <div class="container">
            <div class="header">
                <h1 class="header-title">Product List</h1>
                <div class="header-btns">
                    <button href="add_product.php" class="btn" type="submit" form="product_form" name="submit">Save</button>
                    <button class="btn" id='cancle-product-btn' type="reset" form="product_form" name="cancle">Cancle</button>
                </div>
            </div>
            <main>
                <form action="add_product.php" method="post" id="product_form">
                    <div class="form-unit">
                        <label for="sku">SKU: </label>
                        <input type="text" name="sku">
                    </div>
                    <div class="form-unit">
                        <label for="name">Name: </label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-unit">
                        <label for="price">Price: </label>
                        <input type="number" name="price">
                    </div>
                    <div class="type-switcher">
                        <label for="productType">Product Type</label>
                        <select name="typeSwitcher" id="productType">
                            <option value="" selected>Type Switcher</option>
                            <option value="dvd" id="DVD">DVD</option>
                            <option value="book" id="Book">BOOK</option>
                            <option value="furniture" id="Furniture">FURNITURE</option>
                        </select>
                    </div>
                    <div id="type-container">
                        <div class="form-unit" id="weight-container">
                            <label for="weight_kg">Weight: </label>
                            <input type="number" name="weight_kg">
                        </div>
                        <div class="form-unit" id="size-container">
                            <label for="size">Size: </label>
                            <input type="number" name="size">
                        </div>
                        <div id="dimenstions-container">
                            <div class="form-unit" id="height-container">
                                <label for="height">Height: </label>
                                <input type="number" name="height">
                            </div>
                            <div class="form-unit" id="width-container">
                                <label for="width">Width: </label>
                                <input type="number" name="width">
                            </div>
                            <div class="form-unit" id="length-container">
                                <label for="length">Length: </label>
                                <input type="number" name="length">
                            </div>
                        </div>
                    </div>
                </form>
                <?= $errors ?>
            </main>
        </div>
        <?php include_once __DIR__ . "/../private/shared/footer.php"; ?>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/script.js">
</script>