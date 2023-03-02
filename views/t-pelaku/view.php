<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TPelaku $model */

// $this->title = $model->id_pelaku;
$this->title = $model->nama_pelaku;
$this->params['breadcrumbs'][] = ['label' => 'T-Pelaku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tpelaku-view">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Data T-Pelaku</p>
            <!-- <h3 class="card-title">Data Kasus</h3> -->
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'id_pelaku' => $model->id_pelaku], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i> Delete', ['delete', 'id_pelaku' => $model->id_pelaku], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'id_pelaku' => $model->id_pelaku], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Id Pelaku</b></td>
                                    <td><?= $model->id_pelaku ?></td>
                                </tr>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td><?= $model->nik ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td><?= $model->nama_pelaku ?></td>
                                </tr>
                                <tr>
                                    <td><b>No Registrasi Kasus</b></td>
                                    <td>
                                        <?php
                                            $register = $model->datakasus ? $model->datakasus->no_register : '-';
                                            echo $register;
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tempat Lahir</b></td>
                                    <td><?= $model->tempat_lahir_pelaku ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Lahir</b></td>
                                    <td>
                                        <?php 
                                            $tgl_lhr = $model->tanggal_lahir_pelaku;
                                            $tanggal_indo = $model->tglIndo($tgl_lhr);
                                            echo $tanggal_indo;
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
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>
                                    <?php
                                         $jk = $model->jenis_kelamin_pelaku;
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
                                    <td><b>Agama</b></td>
                                    <td>
                                    <?php
                                        $ag = $model->agama_pelaku;
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
                                    <td><b>Umur</b></td>
                                    <td><?= $model->umur_pelaku ?> Tahun</td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $model->alamat_pelaku ?></td>
                                </tr>
                                <tr>
                                    <td><b>Hubungan Korban</b></td>
                                    <td><?= $model->hub_korban ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pelaku',
            'nik',
            'nama_pelaku',
            'id_kasus',
            'tempat_lahir_pelaku',
            'tanggal_lahir_pelaku',
            'jenis_kelamin_pelaku',
            'agama_pelaku',
            'umur_pelaku',
            'alamat_pelaku:ntext',
            'hub_korban',
            'create_at',
            'update_at',
            'create_by',
            'update_by',
        ],
    ]) ?> -->

</div>
