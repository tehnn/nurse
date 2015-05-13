<?php

namespace app\controllers;

use Yii;
use app\models\KpiSubHos;
use app\models\KpiSubHosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KpiSubHosController implements the CRUD actions for KpiSubHos model.
 */
class KpiSubHosController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all KpiSubHos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KpiSubHosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KpiSubHos model.
     * @param string $year
     * @param string $month
     * @param string $hospcode
     * @return mixed
     */
    public function actionView($year, $month, $hospcode)
    {
        return $this->render('view', [
            'model' => $this->findModel($year, $month, $hospcode),
        ]);
    }

    /**
     * Creates a new KpiSubHos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KpiSubHos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'year' => $model->year, 'month' => $model->month, 'hospcode' => $model->hospcode]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KpiSubHos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $year
     * @param string $month
     * @param string $hospcode
     * @return mixed
     */
    public function actionUpdate($year, $month, $hospcode)
    {
        $model = $this->findModel($year, $month, $hospcode);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'year' => $model->year, 'month' => $model->month, 'hospcode' => $model->hospcode]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KpiSubHos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $year
     * @param string $month
     * @param string $hospcode
     * @return mixed
     */
    public function actionDelete($year, $month, $hospcode)
    {
        $this->findModel($year, $month, $hospcode)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KpiSubHos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $year
     * @param string $month
     * @param string $hospcode
     * @return KpiSubHos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($year, $month, $hospcode)
    {
        if (($model = KpiSubHos::findOne(['year' => $year, 'month' => $month, 'hospcode' => $hospcode])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
