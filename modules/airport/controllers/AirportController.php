<?php

namespace app\modules\airport\controllers;

use app\components\airport\Payment;
use app\modules\airport\models\DataUserPayment;
use app\components\airport\User as ComponentUser;
use app\modules\airport\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

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

    public function actionShowBalance($buy_pro = null)
    {
        $balance = '';
        $session = Yii::$app->session;
        $not_money = false;

        if ($session->getIsActive()) {
            if (is_null($buy_pro)) {
                $session->remove('params');
            }
        } else {
            $session->open();
        }

        if (Yii::$app->request->post()) {
            $user = new ComponentUser(
                Yii::$app->request->post('full_name'),
                Yii::$app->request->post('country')
            );
            $session->set('params', $user);
            $balance = $user->showBalanceUser();
        }

        if (!is_null($buy_pro)) {
            if ($session->get('params')->showBalanceUser() < Payment::PRO_PRICE) {
                $not_money = true;
            } else {
                $session->get('params')->buyPro();
            }
            $balance = $session->get('params')->showBalanceUser();
        }

        return $this->render('balance', [
            'not_money' => $not_money,
            'balance' => $balance,
            'name' => $session->get('params')->fio,
            'country' => $session->get('params')->country
        ]);
    }
}