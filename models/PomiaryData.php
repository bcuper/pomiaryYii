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

    public function zwrocNajnowszaWartosc(string $miejsce, string $jednostka='')
    {
        $dane = $temp = Pomiary::find()->where(['miejsce' => $miejsce])->orderBy('time DESC')->one();
        $ret = $dane['value']. $jednostka.' ('.$dane['time'].')';
        return $ret;

    }
}