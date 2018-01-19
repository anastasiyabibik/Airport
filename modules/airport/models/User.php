<?php
namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['full_name'], 'string'],
            [['balance'], 'float']
        ];
    }

    public function getDataUserPayment()
    {
        return $this->hasMany(DataUserPayment::className(), ['user_id' => 'id']);
    }

    public function getUserPayments()
    {
        return $this->hasMany(UserPayment::className(), ['id' => 'user_payment_id'])
            ->viaTable('data_user_payment', ['user_id' => 'id']);
    }
}
