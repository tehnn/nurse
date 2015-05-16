<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadForm;
use yii\web\UploadedFile;
use PHPExcel_IOFactory;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {

        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionTemplate() {
        return $this->render('template');
    }

    public function actionUpload1() {// hos

        $model = new UploadForm();
        $filename_old = "";
        $filename_new = "";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $filename_old = $model->file->baseName . '.' . $model->file->extension;
                $filename_new = $model->file->baseName . '_' . date('YmdHis') . '.' . $model->file->extension;
                $model->file->saveAs('uploads/hos/' . $filename_new);
                $this->addkpi("./uploads/hos/$filename_new", "data_hos");
            }
        }

        return $this->render('upload1', [
                    'model' => $model,
                    'filename_old' => $filename_old
        ]);
    }
    
       public function actionUpload2() { //pcu

        $model = new UploadForm();
        $filename_old = "";
        $filename_new = "";
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) {
                $filename_old = $model->file->baseName . '.' . $model->file->extension;
                $filename_new = $model->file->baseName . '_' . date('YmdHis') . '.' . $model->file->extension;
                $model->file->saveAs('uploads/pcu/' . $filename_new);
                $this->addkpi("./uploads/pcu/$filename_new", "data_pcu");
            }
        }

        return $this->render('upload2', [
                    'model' => $model,
                    'filename_old' => $filename_old
        ]);
    }

    public function exec($sql) {
        return Yii::$app->db->createCommand($sql)->execute();
    }

    public function getTableColumn($table) {
        $sql = "SHOW COLUMNS FROM $table";
        //$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'data_pcu';";
        $raw = Yii::$app->db->createCommand($sql)->queryAll();
        $cols = [];
        foreach ($raw as $value) {
            $cols[] = $value['Field'];
        }
        //print_r($cols);
        return $cols;
    }
    
     public function addkpi($filepath,$table) {

        $columns = $this->getTableColumn($table);
        $columns = implode(",", $columns);

        $file_ = $filepath;

        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($file_);

        $highestColumn = $objPHPExcel->setActiveSheetIndex(2)->getHighestColumn();
        $highestRow = $objPHPExcel->setActiveSheetIndex(2)->getHighestRow();

        $highestColumn++;
        $all_row = array();
        for ($row = 1; $row < $highestRow + 1; $row++) {

            $rows = array();

            for ($column = 'A'; $column != $highestColumn; $column++) {
                $cell[$column] = $objPHPExcel->setActiveSheetIndex(2)
                                ->getCell($column . $row)->getCalculatedValue();

                $cell[$column] = $cell[$column] == "#DIV/0!" ? 0 : $cell[$column];

                $rows[$column] = $cell[$column];
            }
            $all_row[] = $rows;


            //$escaped_values = array_map('mysql_real_escape_string', array_values($rows));
            //$values = implode("','", $escaped_values);
            $values = implode("','", $rows);
            $sql = "REPLACE INTO $table ($columns) VALUES ('$values')";
            $this->exec($sql);

            //echo "<hr>";
        }
        $sql = "delete from $table where kpi=0";
        $this->exec($sql);
        //$columns=$this->getTableColumn('data_pcu');
        //\Yii::$app->db->createCommand()->batchInsert('data_pcu',$columns,$all_row)->execute();
    }

}
