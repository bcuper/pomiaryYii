<?php
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;

$this->title = 'Temperatura wewnętrzna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pomiary-index">

    <h1>Temperatura wewnętrzna</h1>
    <p>Aktualna wartość <?=$aktual_wew?></p>

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
                    'text' => 'Temparatura',
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
         'series' => $temp_wew
            
        ]);
        ?></p>

    <div class="container-fluid">
    <?php echo LinkPager::widget(['pagination' => $pagination]); ?>
        <table class="table">
            <tr>
                <th>Wartość</th>
                <th>Godzina pomiaru</th>
            </tr>
        <?php foreach ($tabelka as $wiersz): ?>
            <tr>
                <td><?=$wiersz['value']?></td>
                <td><?=$wiersz['time']?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
        