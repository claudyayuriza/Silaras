<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TKorbanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tkorban-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'id_korban') ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'nama_korban') ?>
        </div>
        <div class="col-sm-6">
            <div class="form-group" style="padding-top: 32px">
                <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    <?php // echo = $form->field($model, 'nik') ?>

    <?php // echo = $form->field($model, 'tempat_lahir') ?>

    <?php // echo = $form->field($model, 'tanggal_lahir') ?>

    <?php // echo $form->field($model, 'jenis_kelamin') ?>

    <?php // echo $form->field($model, 'agama_korban') ?>

    <?php // echo $form->field($model, 'umur_korban') ?>

    <?php // echo $form->field($model, 'alamat_korban') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php // echo $form->field($model, 'id_kasus') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>


