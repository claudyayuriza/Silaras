<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Korban $model */

// $this->title = $model->NIK;
$this->title = $model->nama_korban;
$this->params['breadcrumbs'][] = ['label' => 'Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="korban-view">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->
    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Data Korban</p>
            <!-- <h3 class="card-title">Data Korban</h3> -->
            <div class="card-tools">
                    <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'NIK' => $model->NIK], ['class' => 'btn btn-info']) ?>
                    <?= Html::a('<i class="fa fa-fw fa-trash"></i> Delete', ['delete', 'NIK' => $model->NIK], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'NIK' => $model->NIK], ['class' => 'btn btn-warning']) ?>
            </div>
            
        </div>

        <div class="card-body">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td><?= $model->NIK ?></td>
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
                                    <td>
                                        <?php 
                                            $tgl_lhr = $model->tanggal_lahir;
                                            $tanggal_indo = $model->tglIndo($tgl_lhr);
                                            echo $tanggal_indo;
                                        ?>
                                    </td>
                                    <!-- <td><= $model->tanggal_lahir ?></td> -->
                                </tr>

                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>
                                        <!-- ?= $model->status_plubish ?> -->
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
                                    <!-- <td><= $model->jenis_kelamin ?></td> -->
                                </tr>

                               
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td><b>Agama</b></td>
                                    <td>
                                    <?php
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
                                        }
                                        echo $agama;
                                        ?>
                                    </td>
                                    <!-- <td>= $model->agama ?></td> -->
                                </tr>

                                <tr>
                                    <td><b>Umur</b></td>
                                    <td><?= $model->umur ?> Tahun</td>
                                </tr>

                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $model->alamat ?></td>
                                </tr>

                                <tr>
                                 <td><b>No HP</b></td>
                                    <td><?= $model->no_hp ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        

            
            
    </div>
    <!-- ?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'NIK',
                    'nama_korban',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'jenis_kelamin',
                    'agama',
                    'umur',
                    'alamat:ntext',
                    'no_hp',
                ],
            ]) ?> -->
    

</div>
