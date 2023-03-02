<?php

use app\models\Kasus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\KasusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kasus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kasus-index">
    
    <div class="card card-outline card-info">
        <div class="card-body">

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'kategori_kasus',
                        'label'=>'Kategori Kasus',
                        'value'=>function($model){
                        return $model->kategori ? $model->kategori->nama_kategori : '-';
                        }
                    ],

                    //'desa_kelurahan',
                    //'kab_kota',
                    [
                        'attribute' => 'desa_kelurahan',
                        'label' => 'Kab/Kota',
                        'format' => 'raw',
                        'value' =>function($model) {
                            $desa = $model->desa_kelurahan;
                            $kab = $model->kab_kota;
                            return 'Desa : '.'<b>'.$desa.'</b>'. '<br>' . 'Kab/Kota : '.'<b>'.$kab.'</b>';
                        }
                    ],

                    //'tanggal_kejadian',
                    // 'tanggal_pelaporan',
                    [
                        'attribute' => 'tanggal_kejadian',
                        'label' => 'Tanggal',
                        'format' => 'raw',
                        'value' =>function($model) {
                            $kejadian = date('d-m-Y', strtotime($model->tanggal_kejadian));
                            $pelaporan = date('d-m-Y', strtotime($model->tanggal_pelaporan));
                            return 'Kejadian : '.'<b>'.$kejadian.'</b>'. '<br>' . 'Pelaporan : '.'<b>'.$pelaporan.'</b>';
                        }
                    ],

                    // 'NIK_korban',
                    // 'nama_pelaku',
                    [
                        'attribute' => 'NIK_korban',
                        'label'=>'Korban & Pelaku',
                        'format' => 'raw',
                        'value'=>function($model){
                            $korban = $model->korban ? $model->korban->nama_korban : '-';
                            $pelaku = $model->nama_pelaku;
                        return 'Korban : '.'<b>'.$korban.'</b>'. '<br>' . 'Pelaku : '.'<b>'.$pelaku.'</b>';
                        }
                    ],

                    // 'tkp',
                    // 'alamat_kejadian:ntext',
                    [
                        'attribute' => 'tkp',
                        'label'=>'TKP',
                        'format' => 'raw',
                        'value'=>function($model){
                            $tkp = $model->tkp;
                            $alamat = $model->alamat_kejadian;
                        return '<b>'.$tkp.'</b>'. '<br>' .'<i>'.$alamat.'</i>';
                        }
                    ],

                    'hub_korban',

                    // 'status_kasus',
                    [
                        'attribute' => 'status_kasus',
                        'label'=>'Status Kasus',
                        'format' => 'raw',
                        'value' => function($model){
                            $status_kasus = $model->status_kasus;
                                if ($status_kasus == 1) {
                                    $status_kasus = '<span class="badge badge-warning">Diproses</span>';
                                } elseif ($status_kasus == 2) {
                                    $status_kasus = '<span class="badge badge-success">Selesai</span>';
                                } else {
                                    $status_kasus = '';
                                } 
                            return $status_kasus;
                        }
                    ],

                    // 'no_register',
                    // [
                    //     'attribute' => 'no_register',
                    //     'label'=>'No Register',
                    //     'contentOptions' => ['style' => 'width:9%; white-space: normal;'],
                    //     'value'=>function($model){
                    //         return $model->no_register;
                    //         }
                    // ],
                    
                    
                    // [
                    //     'attribute' => 'nama_pelaku',
                    //     'label'=>'Nama Pelaku',
                    //     'contentOptions' => ['style' => 'width:15%; white-space: normal;'],
                    //     'value'=>function($model){
                    //         return $model->nama_pelaku;
                    //         }
                    // ],
                    // 'jenis_kelamin',
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
                    
                    // 'usia_pelaku',
                    // [
                    //     'attribute' => 'usia_pelaku',
                    //     'label' => 'Usia Pelaku',
                    //     'value' =>function($model) {
                    //         $usia = $model->usia_pelaku;
                    //         return $usia.' Tahun';
                    //     }
                    // ],
                    // 'kategori_kasus',
                    
                    //'deskripsi_kasus:ntext', 
                    
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Kasus $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'no_register' => $model->no_register]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <!-- <p>
        ?= Html::a('Tambah Kasus', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
