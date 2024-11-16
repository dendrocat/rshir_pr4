<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Page Delete</title>
        <link rel="stylesheet" href="apache-style.css" type="text/css"/>
    </head>
    <body>
        <div class="nav">
            <a href="../nav.html">Назад</a>
        </div>
        <div class="cont">
            <form method="post">
                <label for="ID">Введите ID товара:</label>
                <input type="number" name="ID" id="ID">
                <button type="submit" name="delBtn">Удалить</button>
            </form>
        </div>
        <div style="margin: 40px"></div>
        <?php
            include_once "database.php";

            if (isset($_POST['delBtn'])) {
                if (!isset($_POST['ID'])) {
                    echo "Поле ID должно быть заполнено";
                    die();
                }
                $sql = "DELETE FROM products WHERE ID={$_POST['ID']}";
                if (Database::query($sql)) {
                    echo "Товар с ID = {$_POST['ID']} был успешно удален";
                }
                else echo "Операция удаления провалена";
            }
        ?>
    </body>
</html>