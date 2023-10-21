<?php

function getCurrentInputs()
{
    $input_values = ['sku', 'name', 'price'];

    if ($_POST['typeSwitcher'] == 'dvd') {
        $input_values[] = 'size';
    }

    if ($_POST['typeSwitcher'] == 'book') {
        $input_values[] = 'weight_kg';
    }

    if ($_POST['typeSwitcher'] == 'furniture') {
        $input_values[] = 'width';
        $input_values[] = 'length';
        $input_values[] = 'height';
    }

    return $input_values;
}
// Display errors
function displayErrors($errors = [])
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "<h2 class='error-text'>Errors:</h2>";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . $error . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}


// Validate inputs
function validateInputs()
{
    $errors = [];

    if (isset($_POST['submit'])) {
        $inputs = getCurrentInputs();

        foreach ($inputs as $input) {
            if (empty($_POST[$input]) || trim($_POST[$input]) == '') {
                $errors[] = ucfirst($input) . " can't be empty.";
            }
        }

        // Check if the input strings include special characters
        $pattern = "/^[a-zA-Z0-9\s]*$/";
        if (preg_match($pattern, $_POST['sku']) === 0) {
            $errors[] = "Please, include only letters, numbers or the combination of both in the SKU.";
        }

        if (preg_match($pattern, $_POST['name']) === 0) {
            $errors[] = "Please, include only letters, numbers or the combination of both in the Name.";
        }

        // Check if the sku already exists in the database
        global $database;

        $sql = "SELECT * FROM products ";
        $sql .= "WHERE sku='" . $_POST['sku'] . "'";
        $result = $database->query($sql);
        if ($result->rowCount() > 0) {
            $errors[] = "This SKU already exists. Please, provide a unique stock keeping unit (SKU).";
        }

        if (!empty($_POST['price']) && !is_numeric($_POST['price'])) {
            $errors[] = "Please, provide a numeric value for the price.";
        }

        if (!empty($_POST['size']) && !is_numeric($_POST['size'])) {
            $errors[] = "Please, provide a numeric value for the size.";
        }

        if (!empty($_POST['weight_kg']) && !is_numeric($_POST['weight_kg'])) {
            $errors[] = "Please, provide a numeric value for the weight.";
        }

        if (!empty($_POST['length']) && !is_numeric($_POST['length'])) {
            $errors[] = "Please, provide a numeric value for the length.";
        }

        if (!empty($_POST['width']) && !is_numeric($_POST['width'])) {
            $errors[] = "Please, provide a numeric value for the width.";
        }

        if (!empty($_POST['height']) && !is_numeric($_POST['height'])) {
            $errors[] = "Please, provide a numeric value for the height.";
        }


        if (!empty($errors)) {
            return displayErrors($errors);
        }
    }
}

// Get the selected type
function getSelectedType($type)
{
    if (isset($_POST['typeSwitcher']) && $_POST['typeSwitcher'] == $type) {
        echo 'selected';
    }
}
