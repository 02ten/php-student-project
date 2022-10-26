<?php 
function openmysqli(): mysqli {
    $connection = new mysqli('db', 'user', 'password', 'appDB');
    return $connection;
}

// Mode
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addUser();
            break;
        case 'DELETE':
            deleteUser();
            break;
        case 'PATCH':
            updateUserPassword();
            break;
        case 'GET':
            getUserByEmail();
            break;
        default:
            echo "Unknown request";
    }
}
catch (Exception $e) {

};

function addUser() {
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $result = $mysqli->query("SELECT * FROM users WHERE email = '{$email}';");
    if ($result->num_rows === 1) {
        echo "User with that email already exist";
    } else {
        $password = generatePass($email, $password);
        $query = "INSERT INTO users (name, email, password)
        VALUES ('" . $name . "', '" . $email . "', '" . $password . "');";
        $mysqli->query($query);
        $mysqli->close();
        echo "New user was created";
    }
}
function deleteUser()
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['email'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $email = $data['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email = '{$email}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM users WHERE email = '" . $email . "';";
        $mysqli->query($query);
        $mysqli->close();
        echo "User was deleted";
    } else {
        echo "User with that email does not exist";
    }
}
function updateUserPassword()
{
    $data = file_get_contents('php://input');
    $data = json_decode($data, true);
    if (!isset($data['email']) || !isset($data['password'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $email = $data['email'];
    $password = $data['password'];
    $result = $mysqli->query("SELECT * FROM users WHERE email = '{$email}';");
    if ($result->num_rows === 1) {
        $password = generatePass($email, $password);
        $query = "UPDATE users SET password = '" . $password . "' WHERE email = '" . $email . "';";
        $mysqli->query($query);
        $mysqli->close();
        echo "Password was changed";
    } else {
        echo "User with that email does not exist";
    }
}
function getUserByEmail()
{
    if (!isset($_GET['email'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $email = $_GET['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email = '{$email}';");
    if ($result->num_rows === 1) {
        foreach ($result as $info) {
            echo "name: " . $info['name'] . "\n";
            echo "email: " . $info['email'];
        }
        $mysqli->close();
    } else {
        echo "User with that email does not exist";
    }
}

function generatePass($usrName, $usrPass) {
    $cmd = "htpasswd -nb {$usrName} {$usrPass}";
    exec($cmd, $output);
    $str = implode('', $output);
    $str = preg_replace('/^' . $usrName . ':/', '', $str);
    return $str;
}
?>