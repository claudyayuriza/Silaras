<?php

use app\models\Korban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KorbanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Korban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-index">
    <div class="card card-outline card-info">
        <div class="card-body">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'NIK',
                'nama_korban',
                // 'tempat_lahir',
                // 'tanggal_lahir',
                [
                    'attribute' => 'tempat_lahir',
                    'label' => 'Tempat Tanggal Lahir',
                    'value' =>function($model) {
                        $tempat_lahir = $model->tempat_lahir;
                        $tanggal_lahir = $model->tanggal_lahir;
                        $tanggal_indo = $model->tglIndo($tanggal_lahir);
                        return $tempat_lahir.' '.'-'.' '.$tanggal_indo;
                    }
                ],
                // 'jenis_kelamin',
                [
                    'attribute' => 'jenis_kelamin',
                    'label'=>'Jenis Kelamin',
                    'value'=>function($model){
                        $jk = $model->jenis_kelamin;
                            if ($jk == 1) {
                                $jk = 'Laki-laki';
                            } elseif ($jk == 2) {
                                $jk = 'Perempuan';
                            } else {
                                $jk = '';
                            } 
                    return $jk;
                    }
                ],
                // 'agama',
                [
                    'attribute' => 'agama',
                    'label'=>'Agama',
                    'value'=>function($model){
                        $ag = $model->agama;
                            if ($ag == 1) {
                                $agama = "Islam";
                            } elseif ($ag == 2) {
                                $agama = "Katolik";
                            } elseif ($ag == 3) {
                                $agama = "Kristen Protestan";
                            } elseif ($ag == 4) {
                                $agama = "Hindu";
                            } elseif ($ag == 5) {
                                $agama = "Buddha";
                            } elseif ($ag == 6) {
                                $agama = "Khonghucu";
                            } else {
                                $agama = '';
                            }
                    return $agama;
                    }
                ],
                // 'umur',
                [
                    'attribute' => 'umur',
                    'label' => 'Umur',
                    'value' =>function($model) {
                        $umur = $model->umur;
                        return $umur.' Tahun';
                    }
                ],
                //'alamat:ntext',
                'no_hp',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Korban $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'NIK' => $model->NIK]);
                    }
                ],
            ],
        ]); ?>
        </div>
    </div>
</div>



    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        ?= Html::a('Create Korban', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
