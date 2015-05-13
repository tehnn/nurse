<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KpiSubHosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kpi Sub Hos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kpi-sub-hos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kpi Sub Hos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'year',
            'month',
            'hospcode',
            'provcode',
            'ampcode',
            // 'q1',
            // 'q2',
            // 'q3',
            // 'q4',
            // 'q5',
            // 'q6',
            // 'q7',
            // 'q8',
            // 'q9',
            // 'q10',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
