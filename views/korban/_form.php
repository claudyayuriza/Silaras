<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\Korban $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="korban-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Korban</h3>
        </div>
        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'NIK')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'nama_korban')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

                        <!-- ?= $form->field($model, 'tanggal_lahir')->textInput() ?> -->
                        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(),[
                            'name' => 'dp_1',
                            'type' => DatePicker::TYPE_INPUT,
                            'options' => ['placeholder' => '-- Tanggal Lahir--'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]); ?>

                        <!-- ?= $form->field($model, 'jenis_kelamin')->textInput() ?> -->
                        <?php
                            $a= ['1' => 'Laki-Laki', '2' => 'Perempuan'];
                            echo $form->field($model, 'jenis_kelamin')->dropDownList($a,['prompt'=>'Pilih']);
                        ?>

                        <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <!-- ?= $form->field($model, 'agama')->textInput() ?> -->
                        <?php 
                            $b= ['1' => 'Islam', '2' => 'Kristen', '3' => 'Hindu', '4' => 'Buddha', '5' => 'Katolik', '6' => 'Khonghucu', '2' => 'Kristen Protestan'];
                            echo $form->field($model, 'agama')->dropDownList($b,['prompt'=>'Pilih']);
                        ?>

                        <?= $form->field($model, 'umur')->textInput() ?>

                        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
