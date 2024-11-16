<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/material.php";

function read_all() {
    $dat = new Database();
    $db = $dat->getConnection();
    $mat = new Material($db);

    $res = $mat->readAll();

    if ($res->num_rows) {
        $mats = array();

        foreach ($res as $row)
            array_push($mats, Material::createArr($row));

        http_response_code(200);
        echo encodeMsg($mats);
    }
    else {
        http_response_code(404);
        echo createMsg("Записи отсутствуют");
    }
}
?>