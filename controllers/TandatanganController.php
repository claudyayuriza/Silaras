<?php

namespace app\controllers;

use app\models\Tandatangan;
use app\models\TandatanganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TandatanganController implements the CRUD actions for Tandatangan model.
 */
class TandatanganController extends Controller
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
     * Lists all Tandatangan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TandatanganSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tandatangan model.
     * @param int $id_pejabat Id Pejabat
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pejabat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pejabat),
        ]);
    }

    /**
     * Creates a new Tandatangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tandatangan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pejabat' => $model->id_pejabat]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tandatangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pejabat Id Pejabat
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pejabat)
    {
        $model = $this->findModel($id_pejabat);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pejabat' => $model->id_pejabat]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tandatangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pejabat Id Pejabat
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pejabat)
    {
        $this->findModel($id_pejabat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tandatangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pejabat Id Pejabat
     * @return Tandatangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pejabat)
    {
        if (($model = Tandatangan::findOne(['id_pejabat' => $id_pejabat])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
