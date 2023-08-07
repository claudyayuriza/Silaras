<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\TKasus;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tkorban-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Korban</h3>
        </div>

        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $datakas = (new TKasus())->getdatakasus();
                        echo $form->field($model, 'id_kasus')->label('Data Kasus')->widget(Select2::classname(), [
                            'data' => $datakas,
                            'language' => 'id',
                            'options' => ['placeholder' => '-- Cari Kasus --', 'class' => 'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nama_korban')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <!-- <= $form->field($model, 'tanggal_lahir')->textInput() ?> -->
                                <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(), [
                                    'name' => 'dp_1',
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => '-- Tanggal Lahir--'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- <= $form->field($model, 'jenis_kelamin')->textInput() ?> -->
                                <?php
                                $a = ['1' => 'Laki-Laki', '2' => 'Perempuan'];
                                echo $form->field($model, 'jenis_kelamin')->dropDownList($a, ['prompt' => '-- Pilih Jenis Kelamin --']);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <!-- <= $form->field($model, 'agama_korban')->textInput() ?> -->
                                <?php
                                $b = ['1' => 'Islam', '2' => 'Kristen', '3' => 'Hindu', '4' => 'Buddha', '5' => 'Katolik', '6' => 'Khonghucu', '2' => 'Kristen Protestan'];
                                echo $form->field($model, 'agama_korban')->dropDownList($b, ['prompt' => '-- Pilih Agama --']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'alamat_korban')->textarea(['rows' => 4]) ?>

                        <?= $form->field($model, 'umur_korban')->textInput() ?>

                        <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
    </div>
    </form>
</div>

<?php ActiveForm::end(); ?>

</div>
<!-- <= $form->field($model, 'id_kasus')->textInput() ?> -->

<?php // = $form->field($model, 'create_at')->textInput() 
?>

<?php // = $form->field($model, 'update_at')->textInput() 
?>

<?php // = $form->field($model, 'create_by')->textInput() 
?>

<?php // = $form->field($model, 'update_by')->textInput() 
?>