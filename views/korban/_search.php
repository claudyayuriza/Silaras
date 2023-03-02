<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KorbanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="korban-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">

        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'NIK') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'nama_korban') ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group" style="padding-top: 32px">
                <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'agama') ?>

    <?php // echo $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_hp') ?>

    <?php ActiveForm::end(); ?>

</div>
