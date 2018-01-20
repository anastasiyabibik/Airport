<?php
use yii\helpers\Html;
/* @var $user \app\components\airport\User */
/* @var $not_money boolean*/

$disabled = $name ? true : false;

$this->title = 'Баланс пользователя';?>

<div class="content">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::beginForm('', 'post', [
        'class' => 'js-validate'
    ])?>

    <p class="error">Поле должно быть заполнено</p>
    <div class="form-group">
        <?= Html::input('text', 'full_name', $name, [
            'class' => 'form-control form-control-lg js-input',
            'placeholder' => 'Введите ФИО',
            'disabled' => $disabled
        ])?>
    </div>
    <div class="form-group">
        <?= Html::dropDownList('country', $country, ['Россия' => 'Россия', 'Франция' => 'Франция'], [
            'class' => 'form-control',
            'disabled' => $disabled
        ])?>
    </div>

    <?if (empty($balance)) :?>
        <?= Html::submitButton('Узнать баланс', ['class' => 'btn btn-primary'])?>
    <? endif ?>

    <? Html::endForm()?>

    <? if (!empty($balance) || $balance === 0) : ?>
        <div class="balance form-group">
            <b> Баланс: <?= $balance; ?> </b>
        </div>

        <div class="buyPRO btn btn-primary">
            <?= Html::a('Купить PRO', 'show-balance?buy_pro=Y')?>
        </div>

        <? if ($not_money):?>
            <span class="error">На счету недостаточно денег!</span>
        <? endif ?>
    <? endif ?>

    <div class="clear btn btn-black">
        <?= Html::a('Сбросить данные', 'show-balance')?>
    </div>
</div>