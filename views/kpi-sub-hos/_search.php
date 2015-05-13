<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSubHosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kpi-sub-hos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'month') ?>

    <?= $form->field($model, 'hospcode') ?>

    <?= $form->field($model, 'provcode') ?>

    <?= $form->field($model, 'ampcode') ?>

    <?php // echo $form->field($model, 'q1') ?>

    <?php // echo $form->field($model, 'q2') ?>

    <?php // echo $form->field($model, 'q3') ?>

    <?php // echo $form->field($model, 'q4') ?>

    <?php // echo $form->field($model, 'q5') ?>

    <?php // echo $form->field($model, 'q6') ?>

    <?php // echo $form->field($model, 'q7') ?>

    <?php // echo $form->field($model, 'q8') ?>

    <?php // echo $form->field($model, 'q9') ?>

    <?php // echo $form->field($model, 'q10') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
