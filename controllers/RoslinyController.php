<?php

namespace app\controllers;
use app\models\PomiaryData;
use app\models\Parapet;

class RoslinyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionParapet()
    {
        $pomiary = new PomiaryData();
        return $this->render('parapet',[
            'wykres' => $pomiary->zwrocDanedoWykresuRosliny('Parapet'),
            'tabelka' => $pomiary->zwrocDaneDoTabelkiRosliny('Parapet'),
        ]);
    }

    public function actionRegal()
    {
        $pomiary = new PomiaryData();

        return $this->render('regal', [
            'wykres' => $pomiary->zwrocDanedoWykresuRosliny('Regal'),
            'tabelka' => $pomiary->zwrocDaneDoTabelkiRosliny('Regal'),
        ]);   
    }

}
