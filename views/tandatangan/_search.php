<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TandatanganSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tandatangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            <!-- <= $form->field($model, 'nip') ?> -->
        </div>
        <!-- <div class="col-md-9">
            <div class="form-group" style="padding-top: 32px;">
                <= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
                <= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div> -->
    </div>
    <!-- <= $form->field($model, 'id_pejabat') ?> -->


    <!-- <= $form->field($model, 'nama_pejabat') ?> -->

    <!-- <= $form->field($model, 'jabatan') ?> -->



    <?php ActiveForm::end(); ?>

</div>