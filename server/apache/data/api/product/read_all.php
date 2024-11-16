<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/product.php";

function read_all() {
    $dat = new Database();
    $db = $dat->getConnection();
    $product = new Product($db);

    $res = $product->readAll();

    if ($res->num_rows) {
        $products = array();

        foreach ($res as $row)
            array_push($products, Product::createArr($row));

        http_response_code(200);
        echo encodeMsg($products);
    }
    else {
        http_response_code(404);
        echo createMsg("Записи отсутствуют");
    }
}
?>