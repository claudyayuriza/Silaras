<?php

namespace app\controllers;

use app\models\TPelaku;
use app\models\TPelakuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TPelakuController implements the CRUD actions for TPelaku model.
 */
class TPelakuController extends Controller
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
     * Lists all TPelaku models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TPelakuSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TPelaku model.
     * @param int $id_pelaku Id Pelaku
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pelaku)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pelaku),
        ]);
    }

    /**
     * Creates a new TPelaku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TPelaku();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pelaku' => $model->id_pelaku]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TPelaku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pelaku Id Pelaku
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pelaku)
    {
        $model = $this->findModel($id_pelaku);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pelaku' => $model->id_pelaku]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TPelaku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pelaku Id Pelaku
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pelaku)
    {
        $this->findModel($id_pelaku)->delete();

        return $this->redirect(['index']);
    }

    //
    //
    //
    //
    //

    public function actionDetail($id_pelaku)
    {
        $model = $this->findModel($id_pelaku);

        return $this->render('detail_kasus.php', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the TPelaku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pelaku Id Pelaku
     * @return TPelaku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pelaku)
    {
        if (($model = TPelaku::findOne(['id_pelaku' => $id_pelaku])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
