<?php
// Подключаем файл с классами для работы со столбиками
use Amenadiel\JpGraph\Plot\AccBarPlot;
use Amenadiel\JpGraph\Plot\BarPlot;

require_once('vendor/autoload.php');
use Amenadiel\JpGraph\Graph\Graph;

$ydata = array();
$labels = range(0,55);

$faker = Faker\Factory::create();
for ($i = 0; $i < 100; $i++) {
    $age = $faker->numberBetween(0, 55);

    $ydata[$i] = $age;
    //echo $age." + ".$ydata[$age]. " ";
}




$graph = new Graph(1280, 600, 'auto', 10, true);

// Указываем, какие оси использовать:
$graph->SetScale('textlin');
$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5,6,7,8,9,10), array(3,7));
$graph->yaxis->HideTicks(false,false);
// Фон графика зальем градиентом:
$graph->SetBackgroundGradient('green', 'yellow');

// Создаём один столбик
$bplot = new BarPlot(array_count_values($ydata));
$bplot->SetLegend('Age');
$graph->xaxis->SetTickLabels($labels);
$graph->title->Set('Age on count');
$graph->title->SetFont(FF_ARIAL, FS_BOLD,16);

// Объединяем столбики

// Присоединяем столбики к графику:
$graph->Add($bplot);

$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
$watermark = imagecreatefrompng('watermark.png');
// Set the margins for the stamp and get the height/width of the stamp image

$sx = imagesx($watermark);
$sy = imagesy($watermark);


imagecopy($gdImgHandler, $watermark, imagesx($gdImgHandler) - $sx, imagesy($gdImgHandler) - $sy, 0, 0, imagesx($watermark), imagesy($watermark));
//выводим рисунок
Header("Content-Type: image/png");
ImagePNG($gdImgHandler);
