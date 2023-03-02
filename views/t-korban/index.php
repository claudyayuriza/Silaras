<?php

use app\models\TKorban;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TKorbanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'T-Korban';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tkorban-index">
    <div class="card card-outline card-info">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id_korban',
                    //'id_kasus',
                    [
                        'attribute' => 'id_kasus',
                        'label' => 'No Registrasi Kasus',
                        'contentOptions' => ['style' => 'width:15%; white-space: normal;'],
                        'format' => 'raw',
                        'value' => function ($model) {
                            $id_kasus = $model->datakasus ? $model->datakasus->no_register : '-';
                            $url = Html::a('Detail Kasus', ['detail', 'id_korban' => $model->id_korban]);
                            return $id_kasus . '<br>' . $url;
                        }
                    ],
                    // 'nik',
                    // 'nama_korban',
                    [
                        'attribute' => 'nik',
                        'label' => 'NIK & Nama Korban',
                        'format' => 'raw',
                        'value' =>function($model) {
                            $nik = $model->nik;
                            $nama_korban = $model->nama_korban;
                            return 'NIK : '.'<b>'.$nik.'</b>'. '<br>' . 'Nama : '.'<b>'.$nama_korban.'</b>';
                        }
                    ],
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
                    //'jenis_kelamin',
                    // [
                    //     'attribute' => 'jenis_kelamin',
                    //     'label'=>'Jenis Kelamin',
                    //     'value'=>function($model){
                    //         $jk = $model->jenis_kelamin;
                    //             if ($jk == 1) {
                    //                 $jk = 'Laki-laki';
                    //             } elseif ($jk == 2) {
                    //                 $jk = 'Perempuan';
                    //             } else {
                    //                 $jk = '';
                    //             } 
                    //     return $jk;
                    //     }
                    // ],

                    //'agama_korban',
                    [
                        'attribute' => 'agama_korban',
                        'label'=>'Agama',
                        'value'=>function($model){
                            $ag = $model->agama_korban;
                                if ($ag == 1) {
                                    $agama_korban = "Islam";
                                } elseif ($ag == 2) {
                                    $agama_korban = "Katolik";
                                } elseif ($ag == 3) {
                                    $agama_korban = "Kristen Protestan";
                                } elseif ($ag == 4) {
                                    $agama_korban = "Hindu";
                                } elseif ($ag == 5) {
                                    $agama_korban = "Buddha";
                                } elseif ($ag == 6) {
                                    $agama_korban = "Khonghucu";
                                } else {
                                    $agama_korban = '';
                                }
                        return $agama_korban;
                        }
                    ],

                    //'umur_korban',
                    [
                        'attribute' => 'umur_korban',
                        'label' => 'Umur korban',
                        'value' =>function($model) {
                            $umur = $model->umur_korban;
                            return $umur.' Tahun';
                        }
                    ],

                    //'alamat_korban:ntext',
                    //'no_hp',
                    //'create_at',
                    //'update_at',
                    //'create_by',
                    //'update_by',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, TKorban $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id_korban' => $model->id_korban]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
