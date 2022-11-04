<?php

namespace app\controllers;
use app\models\PomiaryData;
use app\models\Pomiary;
use yii\data\Pagination;

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

    public function actionSzczegoly(string $miejsce, int $port)
    {
        $pomiary = new PomiaryData();

        $query = Pomiary::find()->where(['miejsce'=>$miejsce, 'port' => $port]);
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);
        $tabelka = $query->orderBy('time DESC')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();


        return $this->render('szczegoly',[
            'miejsce' => $miejsce,
            'port' => $port,
            'wykres' => $pomiary->zwrocDaneWykresSzczegoly($miejsce, $port),
            'tabela' => $tabelka,
            'pagination' => $pagination,
        ]);
    }

}
