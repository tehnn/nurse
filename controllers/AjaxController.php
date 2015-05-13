<?php

namespace app\controllers;

use yii;
use app\models\CsubHos;

class AjaxController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionGetHospname($hospcode = null) {
        yii::$app->response->format = 'json';
        $data = CsubHos::find()->asArray()->where(['hospcode' => $hospcode])->one();
        return $data;
    }

}
