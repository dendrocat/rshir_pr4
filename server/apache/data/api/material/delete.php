<?php
require_once "../core/util.php";
require_once "../core/database.php";
require_once "../objects/material.php";

function delete() {
    $dat = new Database();
    $db = $dat->getConnection();
    $mat = new Material($db);


    $mat->id = $_GET['ID'];

    if ($mat->delete()) {
        http_response_code(200);
        echo createMsg("Запись успешно удалена");
    }
    else {
        http_response_code(404);
        echo createMsg("Невозможно удалить запись c ID = {$mat->id}");
    }
}
?>