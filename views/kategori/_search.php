<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\KategoriSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'nama_kategori') ?>
        </div>
        <div class="col-md-9">
            <div class="form-group" style="padding-top: 32px;">
                <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php // echo $form->field($model, 'id_kategori') ?>

    <?php ActiveForm::end(); ?>

</div>
