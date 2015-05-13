<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSubHos */

$this->title = 'แก้ไขผลงาน';
$this->params['breadcrumbs'][] = ['label' => 'Kpi Sub Hos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->year, 'url' => ['view', 'year' => $model->year, 'month' => $model->month, 'hospcode' => $model->hospcode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kpi-sub-hos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
