<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class UserPayment extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_payment';
    }

    public function rules()
    {
        return [
            [['payment_id'], 'integer'],
            [['data'], 'safe']
        ];
    }

    public function getPayment()
    {
        return $this->hasOne(Payment::className(),['id' => 'payment_id']);
    }
}
