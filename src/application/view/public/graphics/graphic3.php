<?php

use Amenadiel\JpGraph\Graph\PieGraph;
use Amenadiel\JpGraph\Plot\PiePlot3D;

require_once('vendor/autoload.php');
use Amenadiel\JpGraph\Graph\Graph;
$data = array();
$legends = array(
    "Konstruktor",
    "Dolls",
    "Toys",
    "Cars",
    "Guns",
);
$faker = Faker\Factory::create();
for ($i = 0; $i < 5; $i++) {
    $age = $faker->numberBetween(100, 1000);

    $data[$i] = $age;
}
// Статистика использования браузеров в процентах


// Создаём график
$graph = new PieGraph(600, 450);
$graph->SetShadow();

// Заголовок графика
$graph->title->Set('Age pie diagram');
$graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);

// Расположение "Легенды" (в процентах/100)
$graph->legend->Pos(0.1, 0.2);

// Создаём круговую диаграмму 3D
$p1 = new PiePlot3d($data);

// Центр круга (в процентах/100)
$p1->SetCenter(0.45, 0.5);

// Угол наклона диаграммы
$p1->SetAngle(30);

// Шрифт для подписей
$p1->value->SetFont(FF_ARIAL, FS_NORMAL, 12);

// Подписи для сегментов диаграммы
$p1->SetLegends($legends);

// Присоединяем диаграмму к графику

$graph->Add($p1);
// Выводим график
//
//$graph->Stroke();
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
$watermark = imagecreatefrompng('watermark.png');
// Set the margins for the stamp and get the height/width of the stamp image

$sx = imagesx($watermark);
$sy = imagesy($watermark);


imagecopy($gdImgHandler, $watermark, imagesx($gdImgHandler) - $sx, imagesy($gdImgHandler) - $sy, 0, 0, imagesx($watermark), imagesy($watermark));
//выводим рисунок
Header("Content-Type: image/png");
ImagePNG($gdImgHandler);

//imagedestroy($im);