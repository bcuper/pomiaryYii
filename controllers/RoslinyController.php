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
        ]);
    }

    public function actionRegal()
    {
        $pomiary = new PomiaryData();

        return $this->render('regal', [
            'wykres' => $pomiary->zwrocDanedoWykresuRosliny('Regal'),
        ]);   
    }

}
