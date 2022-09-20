<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorting array</title>
</head>
<body>
    <?php
    if (isset($_GET['arr']))
    {
        echo "Array before sorting: ".$_GET['arr']."<br>";
        $arr_before = explode(",", $_GET['arr']);
        $arr_after = insertSort($arr_before);
        echo "Array after sorting: ";
        for($i = 0; $i < count($arr_after)-1; $i++){
            echo $arr_after[$i].",";
        }
        echo $arr_after[count($arr_after)-1];
    }else{
        echo "Argument is empty";
    }

    function insertSort(array $arr) {
        $count = count($arr);
        if ($count <= 1) {
            return $arr;
        }
     
        for ($i = 1; $i < $count; $i++) {
            $cur_val = $arr[$i];
            $j = $i - 1;
     
            while (isset($arr[$j]) && $arr[$j] > $cur_val) {
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $cur_val;
                $j--;
            }
        }
     
        return $arr;
    }
    ?>
</body>
</html>