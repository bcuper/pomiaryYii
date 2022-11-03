<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Temperatura wewnętrzna</h2>
                <p>Aktualna wartość <?=$aktual_wew?>

                <p><?php    echo \onmotion\apexcharts\ApexchartsWidget::widget([
         'type' => 'line',
         'height' => '200', // default 350
         'width' => '500', // default 100%
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

            </div>
            <div class="col-lg-4">
                
            <table class="table">
                <tr>
                    <th>Godzina</th>
                    <th>Wartość</th>
                </tr>
                <?php foreach($tab_wew as $row): ?>
                    <tr>
                        <td><?=$row['time']?></td>
                        <td><?=$row['value']?>&#x2103</td>
                    </tr>
                <?php endforeach; ?>
            </table>

                
            </div>
            
        </div>


        <div class="row">
            <div class="col-lg-6">
                <h2>Temperatura zewnętrzna</h2>
                <p>Aktualna wartość <?=$aktual_zew?>

                <p><?php    echo \onmotion\apexcharts\ApexchartsWidget::widget([
         'type' => 'line',
         'height' => '200', // default 350
         'width' => '500', // default 100%
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
         'series' => $temp_zew
            
        ]);
        ?></p>

            </div>
            <div class="col-lg-4">
                
            <table class="table">
                <tr>
                    <th>Godzina</th>
                    <th>Wartość</th>
                </tr>
                <?php foreach($tab_zew as $row): ?>
                    <tr>
                        <td><?=$row['time']?></td>
                        <td><?=$row['value']?>&#x2103</td>
                    </tr>
                <?php endforeach; ?>
            </table>

                
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2>Wilgotność</h2>
                <p>Aktualna wartość <?=$aktual_wil?></p>

                <p><?php    echo \onmotion\apexcharts\ApexchartsWidget::widget([
         'type' => 'line',
         'height' => '200', // default 350
         'width' => '500', // default 100%
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
                    'text' => 'Wilgotność',
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
         'series' => $wilgotnosc
            
        ]);
        ?></p>

            </div>
            <div class="col-lg-4">
                
            <table class="table">
                <tr>
                    <th>Godzina</th>
                    <th>Wartość</th>
                </tr>
                <?php foreach($tab_wil as $row): ?>
                    <tr>
                        <td><?=$row['time']?></td>
                        <td><?=$row['value']?>&#x2103</td>
                    </tr>
                <?php endforeach; ?>
            </table>

                
            </div>
            
        </div>

        <div class="row">
            <div class="col-lg-6">
                <h2>Ciśnienie</h2>
                <p>Aktualna wartość <?=$aktual_cis?></p>

                <p><?php    echo \onmotion\apexcharts\ApexchartsWidget::widget([
         'type' => 'line',
         'height' => '200', // default 350
         'width' => '500', // default 100%
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
                    'text' => 'Wilgotność',
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
         'series' => $cisnienie
            
        ]);
        ?></p>

            </div>
            <div class="col-lg-4">
                
            <table class="table">
                <tr>
                    <th>Godzina</th>
                    <th>Wartość</th>
                </tr>
                <?php foreach($tab_cis as $row): ?>
                    <tr>
                        <td><?=$row['time']?></td>
                        <td><?=$row['value']?>&#x2103</td>
                    </tr>
                <?php endforeach; ?>
            </table>

                
            </div>
            
        </div>
        

    </div>
</div>
