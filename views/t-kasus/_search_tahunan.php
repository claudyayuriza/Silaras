<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\models\Kategori;
use kartik\select2\Select2;

?>
<div class="kasus-search">

    <?php $form = ActiveForm::begin([
        'action' => ['rekap-kasus-tahunan'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">


                <div class="col-sm-3">
                    <?php
                    $tahun = array_combine(range(date("Y"), 2022), range(date("Y"), 2022));
                    echo $form->field($model, 'tahun')->dropDownList($tahun)
                    ?>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="form-group" style="padding-top: 32px">
                            <?= Html::submitButton('<i class="fa fa-fw fa-search"></i> Cari', ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('<i class="fas fa-print"></i> Cetak Rekap', ['cetak-kasus-tahunan',  'tahun' => $model->tahun], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>







<!-- <= $form->field($model, 'jenis_kelamin_pelaku') ?> -->

<!-- <= $form->field($model, 'alamat_pelaku') ?> -->

<?php // echo $form->field($model, 'usia_pelaku') 
?>

<?php // echo $form->field($model, 'hub_korban') 
?>

<?php // echo $form->field($model, 'tanggal_kejadian') 
?>



<?php // echo $form->field($model, 'deskripsi_kasus') 
?>


<?php // echo $form->field($model, 'tkp') 
?>

<?php // echo $form->field($model, 'desa_kelurahan') 
?>

<?php // echo $form->field($model, 'kab_kota') 
?>