<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KpiSubHos */

$this->title = 'บันทึกตัวชี้วัด';
$this->params['breadcrumbs'][] = ['label' => 'ย้อนกลับ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sub-hos-create">
    <div class="well well-sm">
    <h3><?= Html::encode($this->title) ?></h3>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
