<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Kategori;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\TKasus $model */
/** @var yii\widgets\ActiveForm $form */


$this->title = 'No. Register Kasus: '.$model->no_register;
$this->params['breadcrumbs'][] = ['label' => 'T Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tkasus-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Isikan form deskripsi penyelesaian proses kasus</p>
        </div>
        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <?= $form->field($model, 'pelayanan')->label('Pelayanan yang diberikan')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'deskripsi_pelayanan')->textarea(['rows' => 3]) ?>

                        <!-- <= $form->field($model, 'status_kasus')->textInput() ?> -->
                        <?php
                            $a= ['1' => 'Diproses', '2' => 'Selesai'];
                            echo $form->field($model, 'status_kasus')->dropDownList($a,['prompt'=>'Select Option']);
                        ?>

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
