<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tandatangan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tandatangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Pejabat Penandatangan </h3>
        </div>

        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $form->field($model, 'nip')->textInput() ?>

                        <?= $form->field($model, 'nama_pejabat')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
                            <!-- <= Html::submitButton('Save', ['class' => 'btn btn-success']) ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php ActiveForm::end(); ?>

</div>