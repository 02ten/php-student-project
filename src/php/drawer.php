<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawer</title>
</head>
<body>
    <?php
    if (isset($_GET["num"]))
    {
        $num = $_GET["num"];
        if(is_numeric($num)){
            $num = (int) ($num);
            $color = $num & 3;
            switch($color){
                case 0:
                    $color = "red";
                    break;
                case 1:
                    $color = "yellow";
                    break;
                case 2 :
                    $color = "black";
                    break;
                default:
                    $color = "green";
            }
            $shape = $num >> 1 & 3;
            switch($shape){
                case 0:
                    $shape = "square";
                    break;
                case 1:
                    $shape = "circle";
                    break;
                case 2 :
                    $shape = "rectangle";
                    break;
                default:
                    $shape = "ellipse";
            }
            $width = 100 + 100 * ($num >> 2 & 3); 
            $height = 100 + 100 * ($num >> 3 & 3);
            if($shape == "circle" || $shape == "square"){
                $width=$height;
            }
            echo "<div>" . "Shape: " . $shape . "<br>Color: " . $color . "<br>Width: " . $width . "<br>Height: " . $height . "<br>"; 
            $figure = "<svg width = " . $width . " height= " . $height . ">";
            if($shape == "rectangle" || $shape == "square"){
                $figure .= "<rect width=" . $width . " height=" . $height . " fill=" . $color . " />";
            }elseif($shape == "ellipse"){
                $figure .= "<ellipse cx=" . $width / 2 . " cy =" . $height / 2 . " rx=" . $width / 2 . " ry=" . $height / 2 . " fill = " . $color . " />";
            }else{
                $figure .= "<circle cx=" . $width / 2 . " cy =" . $height / 2 . " r=" . $width / 2 . " fill = " . $color . " />";
            }

            echo $figure . "</svg> </div>";
        }else{
            echo "Parameter is NaN";
        }
    }else{
        echo "Parameter is empty";
    }
    ?>
</body>
</html>