<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */

// $this->title = $model->id_korban;
$this->title = $model->nama_korban;
$this->params['breadcrumbs'][] = ['label' => 'T-Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tkorban-view">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Data T-Korban</p>
            <!-- <h3 class="card-title">Data Kasus</h3> -->
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'id_korban' => $model->id_korban], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i> Delete', ['delete', 'id_korban' => $model->id_korban], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index'], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Id Korban</b></td>
                                    <td><?= $model->id_korban ?></td>
                                </tr>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td><?= $model->nik ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Korban</b></td>
                                    <td><?= $model->nama_korban ?></td>
                                </tr>

                                <tr>
                                    <td><b>Tempat Lahir</b></td>
                                    <td><?= $model->tempat_lahir ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Lahir</b></td>
                                    <!-- <td><= $model->tanggal_lahir ?></td> -->
                                    <td>
                                        <?php 
                                            $tgl_lhr = $model->tanggal_lahir;
                                            $tanggal_indo = $model->tglIndo($tgl_lhr);
                                            echo $tanggal_indo;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <!-- <td><= $model->jenis_kelamin ?></td> -->
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
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Agama Korban</b></td>
                                    <!-- <td><= $model->agama_korban ?></td> -->
                                    <td>
                                    <?php
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
                                        }
                                        echo $agama_korban;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Umur Korban</b></td>
                                    <td><?= $model->umur_korban ?> Tahun</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Korban</b></td>
                                    <td><?= $model->alamat_korban ?></td>
                                </tr>
                                <tr>
                                    <td><b>No HP</b></td>
                                    <td><?= $model->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td><b>No Registrasi kasus</b></td>
                                    <td>
                                        <?php
                                            $register = $model->datakasus ? $model->datakasus->no_register : '-';
                                            echo $register;
                                        ?>
                                    </td>
                                    <!-- <td><= $model->id_kasus ?></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- <= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_korban',
            'nik',
            'nama_korban',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'agama_korban',
            'umur_korban',
            'alamat_korban:ntext',
            'no_hp',
            'id_kasus',
            'create_at',
            'update_at',
            'create_by',
            'update_by',
        ],
    ]) ?> -->


