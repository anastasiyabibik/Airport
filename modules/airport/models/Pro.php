<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class Pro extends ActiveRecord
{
    public static function tableName()
    {
        return 'pro';
    }

    public function rules()
    {
        return [
            [['sum'], 'float'],
        ];
    }
}
