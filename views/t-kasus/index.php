<?php

use app\models\TKasus;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TKasusSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Data Kasus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tkasus-index">

    <?php // echo = Html::a('Create T Kasus', ['create'], ['class' => 'btn btn-success']) 
    ?>

    <div class="card card-outline card-info">
        <div class="card-body">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'label' => 'Aksi',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $url = Html::a('<span class="badge badge-warning"><i class="fa fa-fw fa-search"></i> Detail Kasus</span>', ['view', 'id_kasus' => $model->id_kasus]);
                            return $url;
                        }
                    ],
                    // 'id_kasus',
                    // 'no_register',
                    // 'kategori_kasus',
                    [
                        'attribute' => 'kategori_kasus',
                        'label' => 'No. Reg / Jenis Kasus',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $reg = $model->no_register;
                            $jenis = $model->kategori ? $model->kategori->nama_kategori : '-';
                            return 'No. Reg : ' . '<b>' . $reg . '</b>' . '<br>' . 'Jenis : ' . '<b>' . $jenis . '</b>';
                        }
                    ],
                    // 'tanggal_pelaporan',
                    // [
                    //     'attribute' => 'tanggal_pelaporan',
                    //     'label' => 'Tanggal Pelaporan',
                    //     'value' => function ($model) {
                    //         $tanggal_pelaporan = date('d-m-Y', strtotime($model->tanggal_pelaporan));
                    //         $tanggal_indo = $model->tglIndo($tanggal_pelaporan);
                    //         return $tanggal_indo;
                    //     }
                    // ],
                    // 'deskripsi_kasus:ntext',


                    // 'tanggal_kejadian',
                    [
                        'attribute' => 'tanggal_kejadian',
                        'label' => 'Tanggal',
                        'format' => 'raw',
                        'value' => function ($model) {
                            $tanggal_kejadian = date('d-m-Y', strtotime($model->tanggal_kejadian));
                            $tanggal_pelaporan = date('d-m-Y', strtotime($model->tanggal_pelaporan));
                            return 'Kejadian : ' . '<b>' . $tanggal_kejadian . '</b>' . '<br>' . 'Pelaporan : ' . '<b>' . $tanggal_pelaporan . '</b>';
                        }
                    ],
                    'deskripsi_kasus:ntext',
                    // 'tkp',
                    [
                        'attribute' => 'tkp',
                        'label' => 'TKP',
                        'format' => 'html',
                        'value' => function ($model) {
                            $tkp_p = $model->tkp;
                            $desalurah = $model->desa_kelurahan;
                            $kabkot = $model->kab_kota;
                            return $tkp_p . '<br> Desa/Keluarahan: <b>' . $desalurah . '</b><br> Kab/Kota: <b>' . $kabkot . '</b>';
                        }
                    ],
                    //'desa_kelurahan',
                    //'kab_kota',
                    // [
                    //     'attribute' => 'desa_kelurahan',
                    //     'label' => 'Kab/Kota',
                    //     'format' => 'raw',
                    //     'value' =>function($model) {
                    //         $desa = $model->desa_kelurahan;
                    //         $kab = $model->kab_kota;
                    //         return 'Desa : '.'<b>'.$desa.'</b>'. '<br>' . 'Kab/Kota : '.'<b>'.$kab.'</b>';
                    //     }
                    // ],
                    // 'status_kasus',
                    [
                        'attribute' => 'status_kasus',
                        'label' => 'Status Kasus',
                        'format' => 'raw',
                        'value' => function ($model) {
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
                    //'creat_at',
                    //'update_at',
                    //'create_by',
                    //'update_by',

                    // [
                    //     'class' => ActionColumn::className(),
                    //     'urlCreator' => function ($action, TKasus $model, $key, $index, $column) {
                    //         return Url::toRoute([$action, 'id_kasus' => $model->id_kasus]);
                    //     }
                    // ],
                ],
            ]); ?>

        </div>
    </div>

</div>