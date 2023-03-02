<?php

namespace app\controllers;

use app\models\TKorban;
use app\models\TKorbanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TKasus;

/**
 * TKorbanController implements the CRUD actions for TKorban model.
 */
class TKorbanController extends Controller
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
     * Lists all TKorban models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TKorbanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TKorban model.
     * @param int $id_korban Id Korban
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_korban)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_korban),
        ]);
    }

    /**
     * Creates a new TKorban model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TKorban();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_korban' => $model->id_korban]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TKorban model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_korban Id Korban
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_korban)
    {
        $model = $this->findModel($id_korban);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_korban' => $model->id_korban]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TKorban model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_korban Id Korban
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_korban)
    {
        $this->findModel($id_korban)->delete();

        return $this->redirect(['index']);
    }

    //
    //
    //
    //
    //

    public function actionDetail($id_korban)
    {
        $model = $this->findModel($id_korban);

        return $this->render('detail.php', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the TKorban model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_korban Id Korban
     * @return TKorban the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_korban)
    {
        if (($model = TKorban::findOne(['id_korban' => $id_korban])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
