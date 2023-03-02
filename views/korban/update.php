<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Korban $model */

// $this->title = 'Update Data Korban: ' . $model->NIK;
$this->title = 'Update Data Korban: ' . $model->nama_korban;
$this->params['breadcrumbs'][] = ['label' => 'Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NIK, 'url' => ['view', 'NIK' => $model->NIK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="korban-update">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
