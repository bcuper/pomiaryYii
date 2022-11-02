<?php

namespace app\controllers;

use app\models\Pomiary;
use yii\web\Controller;
use app\models\PomiaryData;
use yii\filters\VerbFilter;
use app\models\PomiarySearch;
use yii\web\NotFoundHttpException;

/**
 * PomiaryController implements the CRUD actions for Pomiary model.
 */
class PomiaryController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Pomiary models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PomiarySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pomiary model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pomiary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pomiary();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pomiary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pomiary model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pomiary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Pomiary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pomiary::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTempciswil()
    {
        $pomiaryData = new PomiaryData();
        $temp_wew = $pomiaryData->zwrocDaneDoWykresu('temp_wew', 'Temp wew');
        $temp_zew = $pomiaryData->zwrocDaneDoWykresu('temp_zew', 'Temp zew');
        $cisnienie = $pomiaryData->zwrocDaneDoWykresu('cisnienie', 'Cisnienie');
        $wilgotnosc = $pomiaryData->zwrocDaneDoWykresu('wilgotnosc', 'Wilgotnosc');
        $aktual_wew = $pomiaryData->zwrocNajnowszaWartosc('temp_wew', '&#x2103');
        return $this->render('tempciswil', [
            'temp_wew' => $temp_wew, 
            'aktual_wew' => $aktual_wew,
            'temp_zew' => $temp_zew,
            'aktual_zew' => $pomiaryData->zwrocNajnowszaWartosc('temp_zew', '&#x2103'),
            'cisnienie' => $cisnienie,
            'aktual_cis' => $pomiaryData->zwrocNajnowszaWartosc('cisnienie', 'hPa'),
            'wilgotnosc' => $wilgotnosc,
            'aktual_wil' => $pomiaryData->zwrocNajnowszaWartosc('wilgotnosc',  '%'),
        ]);
    }

    
}
