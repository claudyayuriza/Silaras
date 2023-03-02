<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Kategori $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Kategori</h3>
        </div>
        <form class="form-horizontal">
            <div class="card-body">

                <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </form>
    </div>

    <?php ActiveForm::end(); ?>

</div>
