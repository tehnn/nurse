<?php

namespace app\controllers;

class PhitlokController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionListPcu($prov=null,$amp=null){
        return $this->render('list_pcu',[
            'prov'=>$prov,
            'amp'=>$amp
        ]);  
    }

}
