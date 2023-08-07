<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TKasus $model */

// $this->title = $model->no_register;
$this->title = 'Detail Kasus';
$this->params['breadcrumbs'][] = ['label' => 'Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tkasus-view">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">No. Register Kasus: <b><?= $model->no_register ?></b></p>
            <!-- <h3 class="card-title">Data Kasus</h3> -->
            <div class="card-tools">
                <!-- <= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Selesaikan Proses', ['selesai', 'id_kasus' => $model->id_kasus], ['class' => 'btn btn-warning']) ?> -->
                <?php
                $selesai = $model->status_kasus;
                if ($model->status_kasus == 1) {
                    $tombol = Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Selesaikan Proses', ['selesai', 'id_kasus' => $model->id_kasus], ['class' => 'btn btn-warning']);
                } elseif ($model->status_kasus == 2) {
                    $tombol = Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Report Kasus', ['report', 'id_kasus' => $model->id_kasus], ['class' => 'btn btn-info']);
                } else {
                    $tombol = '';
                }

                echo $tombol;
                ?>
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'id_kasus' => $model->id_kasus], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i> Delete', ['delete', 'id_kasus' => $model->id_kasus], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Yakin Ingin Menghapus Data Kasus ?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Status Kasus</b></td>
                                    <!-- <td><= $model->status_kasus ?></td> -->
                                    <td>
                                        <?php
                                        $stakas = $model->status_kasus;
                                        if ($stakas == 1) {
                                            $stakas = '<span class="badge badge-warning">Diproses</span>';
                                        } elseif ($stakas == 2) {
                                            $stakas = '<span class="badge badge-success">Selesai</span>';
                                        } else {
                                            $stakas = '';
                                        }
                                        echo $stakas;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Kejadian</b></td>
                                    <!-- <td><= $model->tanggal_kejadian ?></td> -->
                                    <td>
                                        <?php
                                        $tgl_kjd = $model->tanggal_kejadian;
                                        $tanggal_indo = $model->tglIndo($tgl_kjd);
                                        echo $tanggal_indo;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Pelaporan</b></td>
                                    <!-- <td><= $model->tanggal_pelaporan ?></td> -->
                                    <td>
                                        <?php
                                        $tgl_plrn = $model->tanggal_pelaporan;
                                        $tanggal_indo = $model->tglIndo($tgl_plrn);
                                        echo $tanggal_indo;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi Kasus</b></td>
                                    <td><?= $model->deskripsi_kasus ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kategori Kasus</b></td>
                                    <!-- <td><= $model->kategori_kasus ?></td> -->
                                    <td>
                                        <?php
                                        $kategori_kasus = $model->kategori ? $model->kategori->nama_kategori : '-';
                                        echo $kategori_kasus;
                                        ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td><b>Create at</b></td>
                                    <td><= $model->create_at ?></td>
                                </tr>
                                <tr>
                                    <td><b>Create by</b></td>
                                    <td><= $model->create_by ?></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>

                                <tr>
                                    <td><b>TKP</b></td>
                                    <td><?= $model->tkp ?></td>
                                </tr>
                                <tr>
                                    <td><b>Desa/Kelurahan</b></td>
                                    <td><?= $model->desa_kelurahan ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kab/Kota</b></td>
                                    <td><?= $model->kab_kota ?></td>
                                </tr>
                                <tr>
                                    <td><b>Pelayanan yang Diberikan </b></td>
                                    <td><?= $model->pelayanan ?></td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi Pelayanan</b></td>
                                    <td><?= $model->deskripsi_pelayanan ?></td>
                                </tr>

                                <!-- <tr>
                                    <td><b>update_at</b></td>
                                    <td><= $model->update_at ?></td>
                                </tr>
                                <tr>
                                    <td><b>update_by</b></td>
                                    <td><= $model->update_by ?></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- ?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kasus',
            'no_register',
            'tanggal_kegiatan',
            'tanggal_pelaporan',
            'deskripsi_kasus:ntext',
            'kategori_kasus',
            'tkp',
            'desa_kelurahan',
            'kab_kota',
            'status_kasus',
            'create_at',
            'update_at',
            'create_by',
            'update_by',
        ],
    ]) ?>-->