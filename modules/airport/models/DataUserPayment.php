<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class DataUserPayment extends ActiveRecord
{
    public static function tableName()
    {
        return 'data_user_payment';
    }

    public function rules()
    {
        return [
            [['user_payment_id', 'user_id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'user.full_name' => 'ФИО',
            'user.balance' => 'Баланс',
            'userPayment.data' => 'Дата платежа',
            'userPayment.payment.pro.sum' => 'Стоимость PRO',
            'userPayment.payment.tax.sum_tax' => 'Налог',
            'userPayment.payment.tax.country.name' => 'Страна'
        ];
    }

    public function getUserPayment()
    {
        return $this->hasOne(UserPayment::className(), ['id' => 'user_payment_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
