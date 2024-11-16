<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/material.php";

function create() {
    $dat = new Database();
    $db = $dat->getConnection();
    $mat = new Material($db);

    $data = getInput();

    if (!empty($data->name)) {
        $mat->name = $data->name;
        
        if ($mat->create()) {
            http_response_code(201);

            echo createMsg("Запись о материале успешно создана");
        }
        else {
            http_response_code(503);
            echo createMsg("Невозможно создать запись о материале");
        }
    }
    else {
        http_response_code(400);
        echo createMsg("Невозможно создать запись о материале. Данные неполные");
    }
}
?>