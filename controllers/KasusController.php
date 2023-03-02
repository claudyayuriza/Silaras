<?php

namespace app\controllers;

use app\models\Kasus;
use app\models\KasusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * KasusController implements the CRUD actions for Kasus model.
 */
class KasusController extends Controller
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
     * Lists all Kasus models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KasusSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kasus model.
     * @param string $no_register No Register
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no_register)
    {
        return $this->render('view', [
            'model' => $this->findModel($no_register),
        ]);
    }

    /**
     * Creates a new Kasus model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kasus();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model -> status_kasus = 1; //status = 1 berarti diproses

                $model->save(false);
                return $this->redirect(['view', 'no_register' => $model->no_register]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kasus model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $no_register No Register
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no_register)
    {
        $model = $this->findModel($no_register);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'no_register' => $model->no_register]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kasus model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $no_register No Register
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no_register)
    {
        $this->findModel($no_register)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kasus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $no_register No Register
     * @return Kasus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionSelesai($no_register)
    {
        $model = Kasus::findOne($no_register); // memilih menampilkan 1 kasusu berdasarkan no_registernya

        $model->load(Yii::$app->request->post()); // ketika tombol selesai diklik maka field verifikator dan mengubah isi dari field status yg awalnya 1 (diproses) mjd -> 2 (selesai)
        $model->status_kasus=2; // lalu field status berita akan berubah mjd 2 (selesai)
        $model->save(false);

        Yii::$app->session->setFlash('success', "Kasus sudah selesai."); // ini fungsinya menampilkan alert success, juka sudah tervefikasi

        return $this->redirect(Yii::$app->request->referrer); // artinya stlh proses diata dilakukan, maka akan di redirect ke tampilan index kasus
    }

    /**
     * Finds the Kasus model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $no_register No Register
     * @return Kasus the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    // public function actionStatusKasus($no_register)
    // {
    //     $model = Kasus::findOne($no_register);

    //     $verify = Yii::$app->user->id;
    // }

    protected function findModel($no_register)
    {
        if (($model = Kasus::findOne(['no_register' => $no_register])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
