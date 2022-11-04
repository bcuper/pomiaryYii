<?php
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;


$this->title = 'Szczegoly '.$miejsce. '/'.$port;
$this->params['breadcrumbs'][] = ['label' =>$miejsce, 'url' =>[strtolower($miejsce)]  ];
$this->params['breadcrumbs'][] = $port;

?>
<div class="pomiary-index">


<h1>Miejsce: <?=$miejsce?></h1>
<h2>Port: <?=$port?><br></h2>

<p><?php    echo \onmotion\apexcharts\ApexchartsWidget::widget([
         'type' => 'line',
         'height' => '500', // default 350
         'width' => '100%', // default 100%
         'chartOptions' => [
            'chart' => [
                'toolbar' => [
                    'show' => true,
                    'autoSelected' => 'zoom'
                ],
            ],
            'xaxis' => [
                'type' => 'datetime',
                // 'categories' => $categories,
                'title' => [
                    'text' => 'Czas',
                ]
            ],
            'yaxis' => [
                'title' => [
                    'text' => 'Wartość',
                ],
            ],

            'stroke' => [
                'curve' => 'smooth',
            ],

            'dataLabels' => [
                'enabled' => false
            ],

            'legend' => [
                'verticalAlign' => 'bottom',
                'horizontalAlign' => 'left',
            ],
        ],
         'series' => $wykres,
            
        ]);
        ?></p>
    <div class="container-fluid">
        <?php echo LinkPager::widget(['pagination'=>$pagination]); ?>

    <table class="table table-sm">
        <tr>
            <th>Czas</th>
            <th>Wartość</th>
        </tr>
        <?php foreach($tabela as $wiersz): ?>
            <tr>
                <td><?=$wiersz['time']?></td>
                <td><?=$wiersz['value']?></td>
            </tr>
            <?php endforeach; ?>
    </table>
    <?php echo LinkPager::widget(['pagination'=>$pagination]); ?>
        </div>

</div>