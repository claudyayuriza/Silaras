<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Kategori;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\TKasus $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tkasus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Data Kasus</h3>
        </div>
        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?php // echo = $form->field($model, 'kategori_kasus')->textInput() 
                        ?>
                        <?php
                        $datakat = (new Kategori)->getDataKategori();
                        echo $form->field($model, 'kategori_kasus')->label('Kategori Kasus')->widget(Select2::classname(), [
                            'data' => $datakat,
                            'language' => 'id',
                            'options' => ['placeholder' => 'Pilih Kategori', 'class' => 'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>

                        <div class="row">
                            <div class="col-md-6">
                                <?php // echo = $form->field($model, 'tanggal_kejadian')->textInput() 
                                ?>
                                <?= $form->field($model, 'tanggal_kejadian')->widget(DatePicker::className(), [
                                    'name' => 'dp_1',
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => 'Tanggal Kejadian'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]); ?>
                            </div>
                            <div class="col-md-6">
                                <?php // echo = $form->field($model, 'tanggal_pelaporan')->textInput() 
                                ?>
                                <?= $form->field($model, 'tanggal_pelaporan')->widget(DatePicker::className(), [
                                    'name' => 'dp_1',
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => 'Tanggal Pelaporan'],
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                                ]); ?>
                            </div>

                        </div>
                        <?= $form->field($model, 'tkp')->textInput(['maxlength' => true]) ?>

                    </div>
                    <div class="col-md-6">
                        <!-- <= $form->field($model, 'no_register')->textInput(['maxlength' => true]) ?> -->

                        <?= $form->field($model, 'deskripsi_kasus')->textarea(['rows' => 6]) ?>

                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($model, 'desa_kelurahan')->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($model, 'kab_kota')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div>
                        <!-- <= $form->field($model, 'status_kasus')->textInput() ?> -->
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </form>
    </div>

    <?php ActiveForm::end(); ?>

</div>




<?php // echo $form->field($model, 'creat_at')->textInput() 
?>

<?php // echo $form->field($model, 'update_at')->textInput() 
?>

<?php // echo $form->field($model, 'create_by')->textInput() 
?>

<?php // echo $form->field($model, 'update_by')->textInput() 
?>