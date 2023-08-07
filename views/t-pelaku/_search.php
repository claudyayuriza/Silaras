<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TPelakuSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tpelaku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'nama_pelaku') ?>
        </div>
        <!-- <div class="col-sm-3">
            <= $form->field($model, 'id_kasus') ?>
        </div> -->
        <div class="col-sm-6">
            <div class="form-group" style="padding-top: 32px">
                <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php // echo = $form->field($model, 'id_pelaku') 
    ?>

    <?php // echo = $form->field($model, 'nik') 
    ?>

    <?php // echo = $form->field($model, 'nama_pelaku') 
    ?>

    <?php // echo = $form->field($model, 'id_kasus') 
    ?>

    <?php // echo = $form->field($model, 'tempat_lahir_pelaku') 
    ?>

    <?php // echo $form->field($model, 'tanggal_lahir_pelaku') 
    ?>

    <?php // echo $form->field($model, 'jenis_kelamin_pelaku') 
    ?>

    <?php // echo $form->field($model, 'agama_pelaku') 
    ?>

    <?php // echo $form->field($model, 'umur_pelaku') 
    ?>

    <?php // echo $form->field($model, 'alamat_pelaku') 
    ?>

    <?php // echo $form->field($model, 'hub_korban') 
    ?>

    <?php // echo $form->field($model, 'create_at') 
    ?>

    <?php // echo $form->field($model, 'update_at') 
    ?>

    <?php // echo $form->field($model, 'create_by') 
    ?>

    <?php // echo $form->field($model, 'update_by') 
    ?>

    <!-- <div class="form-group">
        <= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div> -->

    <?php ActiveForm::end(); ?>

</div>