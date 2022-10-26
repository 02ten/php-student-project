<?php 
function openmysqli(): mysqli {
    $connection = new mysqli('db', 'user', 'password', 'appDB');
    return $connection;
}

try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addProduct();
            break;
        case 'DELETE':
            deleteProductByName();
            break;
        case 'PATCH':
            updateProductByName();
            break;
        case 'GET':
            getProductByName();
            break;
        default:
            echo "Unknown request"
    }
}catch (Exception $e) {

};

function addProduct()
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['name']) || !isset($data['price']) || !isset($data['url_to_photo'])) {
        throw new Exception("No input provided");
    }
    $toyName = $data['name'];
    $toyPrice = $data['price'];
    $url_to_photo = $data['url_to_photo'];
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM product WHERE name = '{$toyName}';");
    if ($result->num_rows === 1) {
        echo "Product is already exist";
    }
    else {
        $query = "INSERT INTO product (name, price, url_to_photo)
        VALUES ('" . $toyName . "', '" . $toyPrice . "', '" . $url_to_photo . "');";
        $mysqli->query($query);
        $mysqli->close();
        $message = "Added a new product";
    }
}
function deleteProductByName()
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['name'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $data['name'];
    $result = $mysqli->query("SELECT * FROM product WHERE name = '{$toyName}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM product WHERE name = '{$toyName}';";
        $mysqli->query($query);
        $mysqli->close();
        echo "Prdoct was deleted";
    } else {
        echo "Product does not exist";
    }
}
function updateProductByName()
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['name']) || !isset($data['price']) || !isset($data['url_to_photo'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $data['name'];
    $toyPrice = $data['price'];
    $url_to_photo = $data['url_to_photo'];
    $result = $mysqli->query("SELECT * FROM product WHERE name = '{$toyName}';");
    if ($result->num_rows === 1) {
        $query = "UPDATE product SET price = " . $toyPrice . ", url_to_photo = '" . $url_to_photo . "' WHERE name = '" . $toyName . "';";
        $mysqli->query($query);
        $mysqli->close();
        echo "Product was updated";
    } else {
        echo "Product does not exist";
    }
}
function getProductByName()
{
    if (!isset($_GET['name'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $toyName = $_GET['name'];
    $query = "SELECT * FROM product WHERE name = '{$toyName}';";
    $result = $mysqli->query($query);
    if ($result->num_rows === 1) {
        foreach ($result as $toy) {
            echo "name: '" . $toy['name'] . "', price: '" . $toy['price'] . "', url: " . $toy['url_to_photo'];
        }
        $mysqli->close();
    } else {
        echo "Product does not exist";
    }
}
?>