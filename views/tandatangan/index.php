<?php

use app\models\Tandatangan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TandatanganSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Penandatangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tandatangan-index">
    <div class="card card-outline card-info">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_pejabat',
                    'nip',
                    'nama_pejabat',
                    'jabatan',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Tandatangan $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_pejabat' => $model->id_pejabat]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
<!-- <h1><= Html::encode($this->title) ?></h1> -->

<!-- <p>
        <= Html::a('Create Tandatangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->