<?php

namespace app\modules\airport\controllers;

use app\modules\airport\models\DataUserPayment;
use app\modules\airport\models\User;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class AirportController extends Controller
{
    public function actionIndex()
    {
        $arrIdUsers = [];
        $users = User::find()
            ->select('id')
            ->where(['LIKE', 'LOWER(full_name)', mb_strtolower('Васильев')])
            ->all();

        foreach ($users as $user) {
            $arrIdUsers[] = $user['id'];
        }

        $query = DataUserPayment::find()->where(['user_id' => $arrIdUsers]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}