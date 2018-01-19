<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class Payment extends ActiveRecord
{
    public static function tableName()
    {
        return 'payment';
    }

    public function rules()
    {
        return [
            [['pro_id', 'tax_id'], 'integer'],
        ];
    }

    public function getPro()
    {
        return $this->hasOne(Pro::className(), ['id' => 'pro_id']);
    }

    public function getTax()
    {
        return $this->hasOne(Tax::className(), ['id' => 'tax_id']);
    }
}
