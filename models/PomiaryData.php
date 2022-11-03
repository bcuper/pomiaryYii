<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pomiary;

/**
 * PomiaryData represents the model behind the search form of `app\models\Pomiary`.
 */
class PomiaryData extends Pomiary
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'port'], 'integer'],
            [['miejsce', 'time'], 'safe'],
            [['value'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function zwrocDaneDoWykresu(string $miejsce, string $nazwa)
    {
        $temp = Pomiary::find()->where(['miejsce' => $miejsce])->all(); 
        $nowa = [];
        $n1 = [];
        foreach ($temp as $row) {
            $n1[] = [$row['time'],$row['value']];   
        }
        $nowa[] = [
            'name' => $nazwa,
            'data' => $n1,
        ];
        return $nowa;
    }

    public function zwrocDaneDoWykresuGodziny(string $miejsce, string $nazwa, int $godziny)
    {
        $time = date("Y-m-d H:i:s", strtotime('-'.$godziny.' hours'));
        //echo $time;
        $temp = Pomiary::find()->where(['miejsce' => $miejsce])->andWhere(['>', 'time', $time])->all(); 
        $nowa = [];
        $n1 = [];
        foreach ($temp as $row) {
            $n1[] = [$row['time'],$row['value']];   
        }
        $nowa[] = [
            'name' => $nazwa,
            'data' => $n1,
        ];
        return $nowa;
    }

    public function zwrocDaneDoTabelki(string $miejsce, int $godziny)
    {
        $time = date("Y-m-d H:i:s", strtotime('-'.$godziny.' hours'));
        $temp = Pomiary::find()->where(['miejsce' => $miejsce])->andWhere(['>', 'time', $time])->orderBy('time DESC')->limit(6)->all(); 
        return $temp;
    }

    public function zwrocNajnowszaWartosc(string $miejsce, string $jednostka='')
    {
        $dane = $temp = Pomiary::find()->where(['miejsce' => $miejsce])->orderBy('time DESC')->one();
        $ret = $dane['value']. $jednostka.' ('.$dane['time'].')';
        return $ret;

    }

    public function zwrocDanedoWykresuRosliny(string $miejsce, int $godziny = 24)
    {
        $ret = [];
        for ($i = 0; $i < 16; $i++) {
            $temp = Pomiary::find()->where(['miejsce' => $miejsce, 'port' => $i])->orderBy('time DESC')->all();
            $t1 = [];
            foreach ($temp as $row) {
                $t1[] = [$row['time'],$row['value']];   
            }
           $ret[] = [
            'name' => 'Port '.$i,
            'data' => $t1,
           ];
        }
        return $ret;
    }

    public function zwrocDaneDoTabelkiRosliny(string $miejsce)
    {
        $ret = [];
        for ($i = 0; $i < 16; $i++) {
            $temp = Pomiary::find()->where(['miejsce' => $miejsce, 'port' => $i])->orderBy('time DESC')->limit(10)->all();
            $n = [];
            foreach ($temp as $row) {
                $n[] = [$row['value'], $row['time']];
            }
            $ret[$i] = $n; 
        }
        return $ret;
    }
}