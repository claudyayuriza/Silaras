<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Kategori;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\KasusSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kasus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <!-- <= $form->field($model, 'kategori_kasus') ?> -->
            <?php
                $datakat = (new Kategori)->getDataKategori();
                echo $form->field($model, 'kategori_kasus')->label('Kategori')->widget(Select2::classname(), [
                    'data' => $datakat,
                    'language' => 'id',
                    'options' => ['placeholder' => '-- Pilih Kategori --','class'=>'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-9">
            <div class="form-group" style="padding-top: 32px">
            <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
            <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    

    <?php // echo $form->field($model, 'NIK_korban') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'alamat_pelaku') ?>

    <?php // echo $form->field($model, 'usia_pelaku') ?>

    <?php // echo $form->field($model, 'hub_korban') ?>

    <?php // echo $form->field($model, 'tanggal_kejadian') ?>

    <?php // echo $form->field($model, 'deskripsi_kasus') ?>

    <?php // echo $form->field($model, 'tkp') ?>

    <?php // echo $form->field($model, 'desa_kelurahan') ?>

    <?php // echo $form->field($model, 'kab_kota') ?>


