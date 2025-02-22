<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/product.php";

function delete() {
    $dat = new Database();
    $db = $dat->getConnection();
    $product = new Product($db);

    $product->id = $_GET['ID'];

    if ($product->delete()) {
        http_response_code(200);
        echo createMsg("Запись успешно удалена");
    }
    else {
        http_response_code(400);
        echo createMsg("Невозможно удалить запись c ID = {$product->id}");
    }
}
?>