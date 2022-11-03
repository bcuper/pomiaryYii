<?php

namespace app\controllers;

use app\models\Pomiary;
use yii\web\Controller;
use app\models\PomiaryData;
use yii\data\Pagination;

class TcwController extends \yii\web\Controller
{
    private $defaultPageSize = 10;
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTempciswil()
    {
        $pomiaryData = new PomiaryData();
        $temp_wew = $pomiaryData->zwrocDaneDoWykresu('temp_wew', 'Temp wew');
        $temp_zew = $pomiaryData->zwrocDaneDoWykresu('temp_zew', 'Temp zew');
        $cisnienie = $pomiaryData->zwrocDaneDoWykresu('cisnienie', 'Cisnienie');
        $wilgotnosc = $pomiaryData->zwrocDaneDoWykresu('wilgotnosc', 'Wilgotnosc');
        $aktual_wew = $pomiaryData->zwrocNajnowszaWartosc('temp_wew', '&#x2103');
        return $this->render('tempciswil', [
            'temp_wew' => $temp_wew, 
            'aktual_wew' => $aktual_wew,
            'temp_zew' => $temp_zew,
            'aktual_zew' => $pomiaryData->zwrocNajnowszaWartosc('temp_zew', '&#x2103'),
            'cisnienie' => $cisnienie,
            'aktual_cis' => $pomiaryData->zwrocNajnowszaWartosc('cisnienie', 'hPa'),
            'wilgotnosc' => $wilgotnosc,
            'aktual_wil' => $pomiaryData->zwrocNajnowszaWartosc('wilgotnosc',  '%'),
        ]);
    }

    public function actionTempwew()
    {
        $pomiaryData = new PomiaryData();

        $query = Pomiary::find()->where(['miejsce' => 'temp_wew']);

        $pagination = new Pagination([
            'defaultPageSize' => $this->defaultPageSize,
            'totalCount' => $query->count(),
        ]);

        $tabelka = $query->orderBy('time DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('tempwew',[
            'temp_wew' => $pomiaryData->zwrocDaneDoWykresu('temp_wew', 'Temp wew'),
            'aktual_wew' => $pomiaryData->zwrocNajnowszaWartosc('temp_wew', '&#x2103'),
            'tabelka' => $tabelka,
            'pagination' => $pagination,
        ]);
    }

    public function actionTempzew()
    {
        $pomiaryData = new PomiaryData();
        $query = Pomiary::find()->where(['miejsce' => 'temp_zew']);

        $pagination = new Pagination([
            'defaultPageSize' => $this->defaultPageSize,
            'totalCount' => $query->count(),
        ]);

        $tabelka = $query->orderBy('time DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('tempzew', [
            'temp_zew' => $pomiaryData->zwrocDaneDoWykresu('temp_zew', 'Temp zew'),
            'aktual_zew' => $pomiaryData->zwrocNajnowszaWartosc('temp_zew', '&#x2103'),
            'tabelka' => $tabelka,
            'pagination' => $pagination,
        ]);
    }

    public function actionCisnienie()
    {
        $pomiaryData = new PomiaryData();
        $query = Pomiary::find()->where(['miejsce' => 'cisnienie']);

        $pagination = new Pagination([
            'defaultPageSize' => $this->defaultPageSize,
            'totalCount' => $query->count(),
        ]);

        $tabelka = $query->orderBy('time DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('cisnienie', [
            'cisnienie' => $pomiaryData->zwrocDaneDoWykresu('cisnienie', 'Cisnienie'),
            'aktual_cis' => $pomiaryData->zwrocNajnowszaWartosc('cisnienie', 'hPa'),
            'tabelka' => $tabelka,
            'pagination' => $pagination,
        ]);
    }

    public function actionWilgotnosc()
    {
        $pomiaryData = new PomiaryData();
        $query = Pomiary::find()->where(['miejsce' => 'wilgotnosc']);

        $pagination = new Pagination([
            'defaultPageSize' => $this->defaultPageSize,
            'totalCount' => $query->count(),
        ]);

        $tabelka = $query->orderBy('time DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('wilgotnosc', [
            'wilgotnosc' => $pomiaryData->zwrocDaneDoWykresu('wilgotnosc', 'Wilgotnosc'),
            'aktual_wil' => $pomiaryData->zwrocNajnowszaWartosc('wilgotnosc',  '%'),
            'tabelka' => $tabelka,
            'pagination' => $pagination,
        ]);
    }

}
