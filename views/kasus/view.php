<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Kasus $model */

$this->title = $model->no_register;
$this->params['breadcrumbs'][] = ['label' => 'Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kasus-view">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Data Kasus</p>
            <!-- <h3 class="card-title">Data Kasus</h3> -->
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'no_register' => $model->no_register], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i> Delete', ['delete', 'no_register' => $model->no_register], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'no_register' => $model->no_register], ['class' => 'btn btn-warning']) ?>
            </div>
            
        </div>

        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>No Register</b></td>
                                    <td><?= $model->no_register ?></td>
                                </tr>

                                <tr>
                                 <td><b>NIK Korban</b></td>
                                    <td><?= $model->NIK_korban ?></td>
                                </tr>

                                <tr>
                                    <td><b>Nama Pelaku</b></td>
                                    <td><?= $model->nama_pelaku ?></td>
                                </tr>

                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>
                                        <?php
                                         $jk = $model->jenis_kelamin;
                                            if ($jk == 1) {
                                                $jk = 'Laki-laki';
                                            } elseif ($jk == 2) {
                                                $jk = 'Perempuan';
                                            } else {
                                                $jk = '';
                                            } 
                                        echo $jk;
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><b>Alamat Pelaku</b></td>
                                    <td><?= $model->alamat_kejadian ?></td>
                                </tr>

                                <tr>
                                    <td><b>Usia Pelaku</b></td>
                                    <td><?= $model->usia_pelaku ?> Tahun</td>
                                </tr>

                                <tr>
                                    <td><b>Hubungan Korban</b></td>
                                    <td><?= $model->hub_korban ?></td>
                                </tr>

                               
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
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
                                            $tgl_plr = $model->tanggal_pelaporan;
                                            $tanggal_indo = $model->tglIndo($tgl_plr);
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
                                    <td>
                                        <?php 
                                            $kategori_kasus = $model->kategori ? $model->kategori->nama_kategori: '-';
                                            echo $kategori_kasus;
                                        ?>
                                    </td>
                                        
                                    <!-- <td><= $model->kategori_kasus ?></td> -->
                                </tr>

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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- <p>
        ?= Html::a('Update', ['update', 'no_register' => $model->no_register], ['class' => 'btn btn-primary']) ?>
        <= Html::a('Delete', ['delete', 'no_register' => $model->no_register], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'no_register',
            'NIK_korban',
            'nama_pelaku',
            'jenis_kelamin',
            'alamat_pelaku:ntext',
            'usia_pelaku',
            'hub_korban',
            'tanggal_kejadian',
            'tanggal_pelaporan',
            'deskripsi_kasus:ntext',
            'kategori_kasus',
            'tkp',
            'desa_kelurahan',
            'kab_kota',
        ],
    ]) ?> -->

</div>
