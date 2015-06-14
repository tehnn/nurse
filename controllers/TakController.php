<?php

namespace app\controllers;

class TakController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
      public function actionListPcu($prov=null,$amp=null){
        return $this->render('list_pcu',[
            'prov'=>63,
            'amp'=>$amp
        ]);  
    }

}
