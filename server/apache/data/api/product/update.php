<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/product.php";

function update() {
    $dat = new Database();
    $db = $dat->getConnection();
    $product = new Product($db);

    $data = getInput();
    $product->id = $data->ID;
    $product->name = $data->name;
    $product->price = $data->price;
    $product->matID = $data->matID;


    if ($product->update()) {
        http_response_code(200);
        echo createMsg("Запись была успешно изменена");
    }
    else {
        http_response_code(404);
        echo createMsg("Невозможно изменить запись с ID = {$data->ID}");
    }
}
?>