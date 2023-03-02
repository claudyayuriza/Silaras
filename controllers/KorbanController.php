<?php

namespace app\controllers;

use app\models\Korban;
use app\models\KorbanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * KorbanController implements the CRUD actions for Korban model.
 */
class KorbanController extends Controller
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
     * Lists all Korban models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KorbanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Korban model.
     * @param string $NIK Nik
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($NIK)
    {
        return $this->render('view', [
            'model' => $this->findModel($NIK),
        ]);
    }

    /**
     * Creates a new Korban model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Korban();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'NIK' => $model->NIK]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Korban model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $NIK Nik
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($NIK)
    {
        $model = $this->findModel($NIK);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'NIK' => $model->NIK]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Korban model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $NIK Nik
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($NIK)
    {
        $this->findModel($NIK)->delete();

        return $this->redirect(['index']);
    }



    /**
     * Finds the Korban model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $NIK Nik
     * @return Korban the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($NIK)
    {
        if (($model = Korban::findOne(['NIK' => $NIK])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
