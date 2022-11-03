<?php

namespace app\controllers;

class RoslinyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionParapet()
    {
        return $this->render('parapet');
    }

    public function actionRegal()
    {
        return $this->render('regal');   
    }

}
