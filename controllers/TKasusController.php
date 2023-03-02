<?php

namespace app\controllers;

use app\models\TKasus;
use app\models\TKasusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TKasusController implements the CRUD actions for TKasus model.
 */
class TKasusController extends Controller
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
     * Lists all TKasus models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TKasusSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TKasus model.
     * @param int $id_kasus Id Kasus
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kasus)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kasus),
        ]);
    }

    /**
     * Creates a new TKasus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    // public function actionCreate()
    // {
    //     $model = new TKasus();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id_kasus' => $model->id_kasus]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionCreate()
    {
        $model = new TKasus();

        $model->create_by = Yii::$app->User->id;
        $model->create_at = date('Y-m-d H:i:s');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model -> status_kasus = 1; //status = 1 berarti diproses

                $model->save();
                
                return $this->redirect(['view', 'id_kasus' => $model->id_kasus]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // public function actionCreate()
    // {
    //     $model = new TKasus();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post())) {

    //             $model -> status_kasus = 1; //status = 1 berarti diproses

    //             $model->save();
                
    //             return $this->redirect(['view', 'id_kasus' => $model->id_kasus]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing TKasus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_kasus Id Kasus
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kasus)
    {
        $model = $this->findModel($id_kasus);

        $model->update_by = Yii::$app->User->id;
        $model->update_at = date('Y-m-d H:i:s');

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kasus' => $model->id_kasus]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TKasus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_kasus Id Kasus
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kasus)
    {
        $this->findModel($id_kasus)->delete();

        return $this->redirect(['index']);
    }

    //
    //
    //

    public function actionSelesai($id_kasus)
    {
        $model = $this->findModel($id_kasus);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kasus' => $model->id_kasus]);
        }

        return $this->render('selesai_proses.php', [
            'model' => $model,
        ]);
    }

    //
    //
    //

    public function actionReport($id_kasus)
    {
        $model = $this->findModel($id_kasus);

        return $this->renderPartial('report_kasus', [
            'model'=> $model,
        ]);
    }

    /**
     * Finds the TKasus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_kasus Id Kasus
     * @return TKasus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kasus)
    {
        if (($model = TKasus::findOne(['id_kasus' => $id_kasus])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
