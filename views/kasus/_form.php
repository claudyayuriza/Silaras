<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Kategori;
use app\models\Korban;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\Kasus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kasus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Kasus</h3>
        </div>

        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'no_register')->textInput(['maxlength' => true]) ?>

                        <!-- <= $form->field($model, 'NIK_korban')->textInput(['maxlength' => true]) ?> -->

                        <?php
                            $datakor = (new Korban)->getDataKorban();
                            echo $form->field($model, 'NIK_korban')->label('NIK & Nama Korban')->widget(Select2::classname(), [
                                'data' => $datakor,
                                'language' => 'id',
                                'options' => ['placeholder' => 'Pilih','class'=>'form-control'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>


                        <?= $form->field($model, 'nama_pelaku')->textInput(['maxlength' => true]) ?>

                        <?php // = $form->field($model, 'jenis_kelamin')->textInput() ?>
                        <?php
                            $a= ['1' => 'Laki-Laki', '2' => 'Perempuan'];
                            echo $form->field($model, 'jenis_kelamin')->dropDownList($a,['prompt'=>'Pilih']);
                        ?>

                        <?= $form->field($model, 'usia_pelaku')->textInput() ?>

                        <?= $form->field($model, 'hub_korban')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'alamat_kejadian')->textarea(['rows' => 6]) ?>

                    </div>
                    <div class="col-md-6">

                        <!-- ?= $form->field($model, 'tanggal_kejadian')->textInput() ?> -->
                        <?= $form->field($model, 'tanggal_kejadian')->widget(DatePicker::className(),[
                            'name' => 'dp_1',
                            'type' => DatePicker::TYPE_INPUT,
                            'options' => ['placeholder' => 'Tanggal Kejadian'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]); ?>

                        <!-- ?= $form->field($model, 'tanggal_pelaporan')->textInput() ?> -->
                        <?= $form->field($model, 'tanggal_pelaporan')->widget(DatePicker::className(),[
                            'name' => 'dp_1',
                            'type' => DatePicker::TYPE_INPUT,
                            'options' => ['placeholder' => 'Tanggal Pelaporan'],
                            'pluginOptions' => [
                                'autoclose'=>true,
                                'format' => 'yyyy-mm-dd',
                                'todayHighlight' => true
                            ]
                        ]); ?>

                        <!-- ?= $form->field($model, 'kategori_kasus')->textInput() ?> -->
                        <?php
                            $datakat = (new Kategori)->getDataKategori();
                            echo $form->field($model, 'kategori_kasus')->label('Kategori Kasus')->widget(Select2::classname(), [
                                'data' => $datakat,
                                'language' => 'id',
                                'options' => ['placeholder' => 'Pilih Kategori','class'=>'form-control'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                        ?>

                        <?= $form->field($model, 'tkp')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'desa_kelurahan')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'kab_kota')->textInput(['maxlength' => true]) ?>
                        
                        <?= $form->field($model, 'deskripsi_kasus')->textarea(['rows' => 6]) ?>
                        
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
