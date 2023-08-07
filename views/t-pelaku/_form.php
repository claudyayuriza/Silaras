<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\TKasus;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\TPelaku $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tpelaku-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Pelaku</h3>
        </div>

        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- <= $form->field($model, 'id_kasus')->textInput() ?> -->
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
                                <?= $form->field($model, 'nik')->label('NIK')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'nama_pelaku')->label('Nama')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'tempat_lahir_pelaku')->label('Tempat Lahir')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <!-- <= $form->field($model, 'tanggal_lahir_pelaku')->label('Tanggal Lahir')->textInput() ?> -->

                                <?= $form->field($model, 'tanggal_lahir_pelaku')->widget(DatePicker::className(), [
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
                                <!-- <= $form->field($model, 'jenis_kelamin_pelaku')->textInput() ?> -->
                                <?php
                                $a = ['1' => 'Laki-Laki', '2' => 'Perempuan'];
                                echo $form->field($model, 'jenis_kelamin_pelaku')
                                    ->label('Jenis Kelamin')
                                    ->dropDownList($a, ['prompt' => '-- Pilih Jenis Kelamin --']);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'umur_pelaku')->label('Umur')->textInput() ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- <= $form->field($model, 'agama_pelaku')->textInput() ?-->
                        <?php
                        $b = ['1' => 'Islam', '2' => 'Kristen', '3' => 'Hindu', '4' => 'Buddha', '5' => 'Katolik', '6' => 'Khonghucu', '2' => 'Kristen Protestan'];
                        echo $form->field($model, 'agama_pelaku')->label('Agama')->dropDownList($b, ['prompt' => '-- Pilih Agama --']);
                        ?>


                        <?= $form->field($model, 'hub_korban')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'alamat_pelaku')->label('Alamat')->textarea(['rows' => 4]) ?>
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
                        <!-- <= Html::submitButton('Save', ['class' => 'btn btn-success']) ?> -->
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php // = $form->field($model, 'create_at')->textInput() 
?>

<?php // = $form->field($model, 'update_at')->textInput() 
?>

<?php // = $form->field($model, 'create_by')->textInput() 
?>

<?php // = $form->field($model, 'update_by')->textInput() 
?>