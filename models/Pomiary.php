<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pomiary".
 *
 * @property int $id
 * @property string $miejsce
 * @property int $port
 * @property float $value
 * @property string $time
 */
class Pomiary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pomiary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['miejsce', 'port', 'value'], 'required'],
            [['port'], 'integer'],
            [['value'], 'number'],
            [['time'], 'safe'],
            [['miejsce'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'miejsce' => 'Miejsce',
            'port' => 'Port',
            'value' => 'Value',
            'time' => 'Time',
        ];
    }
}
