<html lang="en">
<head>
    <title>Page Read Users</title>
    <link rel="stylesheet" href="apache-style.css" type="text/css"/>
</head>
    <body>
        <div class="nav">
            <a href="../nav.html">Назад</a>
        </div>
        <table>
            <tr><th>ID</th><th>Логин</th><th>Пароль</th><th>Группа</th></tr>
            <?php
                include_once "./database.php";

                $q = "SELECT users.ID as ID, users.name as name, passwd, user_group.name as group_name FROM users JOIN user_group ON users.groupID = user_group.ID";
                $res = Database::query($q);
                foreach ($res as $row)
                    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['passwd']}</td><td>{$row['group_name']}</td></tr>";
            ?>
        </table>
    </body>
</html>