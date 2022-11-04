<?php
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;

$this->title = 'Regal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pomiary-index">

    <h1>
        Rośliny Regał
    </h1>

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
         'series' => $wykres
            
        ]);
        ?></p>

<table class="table table-sm table-striped table-bordered">
            <?php foreach($tabelka as $row=>$val ): ?>
                <tr>
                    <th>
                    <?= Html::a('Port '.$row, ['szczegoly', 'miejsce' => 'Regal', 'port' => $row], ['class' => 'btn btn-primary btn-sm']) ?>
                    </th>
                    <?php foreach ($val as $pomiar): ?>
                        <td class="text-center"><?=$pomiar[0]?><br><small><?=$pomiar[1]?></small></td>
                        <?php endforeach; ?>
                </tr>

            <?php endforeach; ?>
        </table>
    
    </div>
        