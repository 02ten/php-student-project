<html lang="en">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="../public/assets/style.css" type="text/css"/>
</head>
<body>
<h1>Таблица пользователей данного продукта</h1>
<table>
    <tr><th>Id</th><th>Name</th><th>Surname</th></tr>
    <ul>
        <li><a href="../public/shop/catalog.php">Каталог</a></li>
        <li><a href="/protected/users.php">Администрирование</a></li>
        <li><a href="/protected/auth.php">Список администраторов</a></li>
        <li><a href="../about.html">О нас</a></li>
    </ul>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
}
?>
</table>
<?php
phpinfo();
?>
</body>
</html>