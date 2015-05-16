<?php

namespace app\controllers;

use Yii;


class AjaxController extends \yii\web\Controller {

     public function queryall($sql) {
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    
  
    
    public function actionFind($word){
        Yii::$app->response->format = "json";
        $sql = "SELECT t.* from chospital t where t.hosname like '%$word%' or t.hoscode like '%$word%' ";
        $raw = $this->queryall($sql);
        return $raw;
    }

}
