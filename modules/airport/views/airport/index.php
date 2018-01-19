<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация о путешествиях Васильевых';

?>
<div class="box">
    <div class="box-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => "<div class='summary'>"
                . "Показаны позиции <b>{begin, number}-{end, number}</b> из <b>{totalCount, number}</b></div>",
            'columns' => [
                'user.full_name',
                'user.balance',
                'userPayment.data',
                'userPayment.payment.pro.sum',
                'userPayment.payment.tax.sum_tax',
                'userPayment.payment.tax.country.name'
            ],
        ]); ?>
    </div>
</div>