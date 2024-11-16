<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/product.php";

function create() {
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);

    $data = getInput();

    if (
        !empty($data->name) &&
        !empty($data->price) &&
        !empty($data->matID)
    ) {
        $product->name = $data->name;
        $product->price = $data->price;
        $product->matID = $data->matID;

        if ($product->create()) {
            http_response_code(201);
            echo createMsg("Запись о товаре успешно создана");
        }
        else {
            http_response_code(400);
            echo createMsg("Невозможно создать запись о товаре");
        }
    }
    else {
        http_response_code(400);
        echo createMsg("Невозможно создать запись о товаре. Данные неполные");
    }
}
?>