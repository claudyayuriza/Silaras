<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Kategori;
use kartik\select2\Select2;

?>
<div class="kasus-search">
    <?php $form = ActiveForm::begin([
        'action' => ['rekap-kasus-bulanan'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-3">
                    <?php
                    $bulan = [
                        '01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember',
                    ];
                    echo $form->field($model, 'bulan')->dropDownList($bulan, [
                        'prompt' => '--Pilih Bulan--',
                    ])
                    ?>
                </div>
                <div class="col-sm-2">
                    <?php
                    $tahun = array_combine(range(date("Y"), 2022), range(date("Y"), 2022));
                    echo $form->field($model, 'tahun')->dropDownList($tahun)
                    ?>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group" style="padding-top:32px">
                            <?= Html::submitButton('<i class="fa fa-fw fa-search"></i>Cari', ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fas fa-print"></i> Cetak Rekap Bulanan', ['cetak-kasus-bulanan', 'bulan' => $model->bulan, 'tahun' => $model->tahun], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>