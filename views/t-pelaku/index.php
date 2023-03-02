<?php

use app\models\TPelaku;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TPelakuSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'T-Pelaku';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpelaku-index">
    <div class="card card-outline card-info">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_pelaku',
                        // 'id_kasus',
                        [
                            'attribute' => 'id_kasus',
                            'label' => 'No Registrasi Kasus',
                            'contentOptions' => ['style' => 'width:15%; white-space: normal;'],
                            'format' => 'raw',
                            'value' => function ($model) {
                                $id_kasus = $model->datakasus ? $model->datakasus->no_register : '-';
                                $url = Html::a('Detail Kasus', ['detail', 'id_pelaku' => $model->id_pelaku]);
                                return $id_kasus . '<br>' . $url;
                            }
                        ],
                        // 'nik',
                        // 'nama_pelaku',
                        [
                            'attribute' => 'nik',
                            'label' => 'NIK & Nama Pelaku',
                            'format' => 'raw',
                            'value' =>function($model) {
                                $nik = $model->nik;
                                $nama_pelaku = $model->nama_pelaku;
                                return 'NIK : '.'<b>'.$nik.'</b>'. '<br>' . 'Nama : '.'<b>'.$nama_pelaku.'</b>';
                            }
                        ],
                        // 'tempat_lahir_pelaku',
                        //'tanggal_lahir_pelaku',
                        [
                            'attribute' => 'tempat_lahir_pelaku',
                            'label' => 'Tempat Tanggal Lahir',
                            'value' =>function($model) {
                                $tempat_lahir_pelaku = $model->tempat_lahir_pelaku;
                                $tanggal_lahir_pelaku = $model->tanggal_lahir_pelaku;
                                return $tempat_lahir_pelaku.' '.'-'.' '.$tanggal_lahir_pelaku;
                            }
                        ],
                        //'jenis_kelamin_pelaku',
                        //'agama_pelaku',
                        [
                            'attribute' => 'agama_pelaku',
                            'label'=>'Agama',
                            'value'=>function($model){
                                $ag = $model->agama_pelaku;
                                    if ($ag == 1) {
                                        $agama_pelaku = "Islam";
                                    } elseif ($ag == 2) {
                                        $agama_pelaku = "Katolik";
                                    } elseif ($ag == 3) {
                                        $agama_pelaku = "Kristen Protestan";
                                    } elseif ($ag == 4) {
                                        $agama_pelaku = "Hindu";
                                    } elseif ($ag == 5) {
                                        $agama_pelaku = "Buddha";
                                    } elseif ($ag == 6) {
                                        $agama_pelaku = "Khonghucu";
                                    } else {
                                        $agama_pelaku = '';
                                    }
                            return $agama_pelaku;
                            }
                        ],
                        // 'umur_pelaku',
                        [
                            'attribute' => 'umur_pelaku',
                            'label' => 'Umur',
                            'value' =>function($model) {
                                $umur = $model->umur_pelaku;
                                return $umur.' Tahun';
                            }
                        ],
                        //'alamat_pelaku:ntext',
                        'hub_korban',
                        //'create_at',
                        //'update_at',
                        //'create_by',
                        //'update_by',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, TPelaku $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_pelaku' => $model->id_pelaku]);
                            }
                        ],
                    ],
                ]); ?>
         </div>
    </div>
</div>
