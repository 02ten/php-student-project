<?php
if(!isset($_COOKIE['lang'])) {
    setcookie('lang', 'ru');
}
if(!isset($_COOKIE['theme'])) {
    setcookie('theme', 'light');
}
$last_uri = $_SERVER['REQUEST_URI'];
setcookie('last_uri', $last_uri);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>О нас</title>
    
        <!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php switch ($_COOKIE['theme']){
    case 'light':
        echo '<link href="/assets/css/light.css" rel="stylesheet" type="text/css">';
        break;
    default:
        echo '<link rel="stylesheet" type="text/css" href="/assets/css/dark.css">';
}?>
</head>
<?php
include 'application/model/about_lang.php';

switch ($_COOKIE['lang']) {
                case 'en':
                    en_about();
                    break;
                default:
                    ru_about(); 
            }

      ?>
</body>
</html>