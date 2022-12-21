<?php


require_once('vendor/autoload.php');


use Amenadiel\JpGraph\Graph\Graph;
use Amenadiel\JpGraph\Plot\LinePlot;

DEFINE('NDATAPOINTS', 360);
DEFINE('SAMPLERATE', 240);
// Создадим немного данных для визуализации:
$xdata = array();
$ydata = array();
$faker = Faker\Factory::create();
for ($i = 0; $i < 50; $i++) {
    $co2 = $faker->randomFloat(1, 1250, 1900);
    array_push($ydata, $co2);
    $time = $faker->time("H:i");
    array_push($xdata, $time);
}

$graph = new Graph(800, 600, 'auto', 10, true);

// Указываем, какие оси использовать:
$graph->SetMargin(40, 40, 30, 130);

// Fix the Y-scale to go between [0,100] and use date for the x-axis
$graph->SetScale('datlin');


/*
Создаем экземпляр класса линейного графика, передадим
ему нужные значения:
*/
$lineplot = new LinePlot($ydata);

// Задаём цвет кривой
$lineplot->SetColor('red');

// Присоединяем кривую к графику:
$graph->Add($lineplot);

// Даем графику имя:
$graph->title->Set('CO2 and time');

/*
Если планируете использовать кириллицу, то необходимо
использовать TTF-шрифты, которые её поддерживают,
например arial.
*/
$graph->title->SetFont(FF_ARIAL, FS_NORMAL);
$graph->xaxis->SetFont(FF_VERDANA, FS_NORMAL, 10);
$graph->yaxis->title->SetFont(FF_TIMES, FS_BOLD);

// Назовем оси:
$graph->xaxis->title->Set('Time');
$graph->xaxis->SetTickLabels($xdata);
$graph->xaxis->SetLabelAngle(90);
//$graph->xaxis->scale->SetTimeAlign(MINADJ_10);
$graph->yaxis->title->Set('Values');

// Выделим оси цветом:
$graph->xaxis->SetColor('#СС0000');
$graph->yaxis->SetColor('#СС0000');

// Зададим толщину кривой:
$lineplot->SetWeight(3);

// Обозначим точки звездочками, задав тип маркера:
$lineplot->mark->SetType(MARK_FILLEDCIRCLE);

// Выведем значения над каждой из точек:
$lineplot->value->Show();

// Фон графика зальем градиентом:
$graph->SetBackgroundGradient('red', 'orange');

// Придадим графику тень:

$gdImgHandler = $graph->Stroke(_IMG_HANDLER);
$watermark = imagecreatefrompng('watermark.png');
// Set the margins for the stamp and get the height/width of the stamp image

$sx = imagesx($watermark);
$sy = imagesy($watermark);


imagecopy($gdImgHandler, $watermark, imagesx($gdImgHandler) - $sx, imagesy($gdImgHandler) - $sy, 0, 0, imagesx($watermark), imagesy($watermark));
//выводим рисунок
Header("Content-Type: image/png");
ImagePNG($gdImgHandler);
