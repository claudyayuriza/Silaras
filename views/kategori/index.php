<?php

use app\models\Kategori;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KategoriSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-index">
    <div class="card card-outline card-info">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id_kategori',
                    'nama_kategori',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Kategori $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_kategori' => $model->id_kategori]);
                            }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

    <!--after class="kategori-index" <h1>?= Html::encode($this->title) ?></h1> -->

    <!-- after class="kategori-index" <p>
        ?= Html::a('Create Kategori', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
