<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class Tax extends ActiveRecord
{
    public static function tableName()
    {
        return 'tax';
    }

    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['sum_tax'], 'float']
        ];
    }

    public function getCountry() {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }
}