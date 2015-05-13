<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KpiSubHos */

$this->title = $model->year;
$this->params['breadcrumbs'][] = ['label' => 'Kpi Sub Hos', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sub-hos-view">

  
    <p>
        <?= Html::a('Update', ['update', 'year' => $model->year, 'month' => $model->month, 'hospcode' => $model->hospcode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'year' => $model->year, 'month' => $model->month, 'hospcode' => $model->hospcode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'year',
            'month',
            'hospcode',
            'hospname',
           
            'q1',
            'q2',
            'q3',
            'q4',
            'q5',
            'q6',
            'q7',
            'q8',
            'q9',
            'q10',
        ],
    ]) ?>

</div>
