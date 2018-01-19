<?php

namespace app\modules\airport\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord
{
    public static function tableName()
    {
        return 'country';
    }

    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }
}
