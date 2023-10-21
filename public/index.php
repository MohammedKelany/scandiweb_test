<?php

use App\classes\Product;

include_once(__DIR__ . '/../vendor/autoload.php');
include_once(__DIR__ . '/../private/db_initialize.php');

// Extracting all Products from Database
$products = Product::selectAll();

// Delete the selected items
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteId'])) {
    Product::delete();
}

?>
<!-- Have different page title for each page -->
<?php $pageTitle = "Home"; ?>
<?php include_once(__DIR__ . "/../private/shared/header.php"); ?>

<body>
    <div class="flex-wrapper">
        <div class="container">
            <div class="header">
                <h1 class="header-title">Product List</h1>
                <div class="header-btns">
                    <a href="add_product.php" class="btn">ADD</a>
                    <button class="btn" id='delete-product-btn' type="submit" form="product_list" name="delete">MASS DELETE</button>
                </div>
            </div>
            <main>
                <!-- Get all the products from the database and display them -->
                <form action="index.php" id='product_list' method='POST'>
                    <div class="product-list">
                        <?php foreach ($products as $product) : ?>
                            <div class="product-box">
                                <input type="checkbox" name="deleteId[]" value="<?= $product->id ?>" class="delete-checkbox">
                                <div class='product-info'>
                                    <span><?= "SKU: " . $product->sku; ?></span>
                                    <span><?= "Name: " . $product->name; ?></span>
                                    <span><?= "Price: " . $product->price . "$"; ?></span>
                                    <span><?php
                                            echo $product->weight_kg != 0.0 ? "Weight: " . $product->weight_kg . "KG" : '';
                                            echo $product->size != 0 ?  "Size: " . $product->size . "MB" : '';
                                            echo $product->dimensions != '' ?
                                                "Dimensions: " . $product->dimensions : '';
                                            ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </form>
            </main>
        </div>
        <?php include_once __DIR__ . "/../private/shared/footer.php"; ?>
    </div>
</body>