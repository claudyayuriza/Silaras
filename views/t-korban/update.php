<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */

$this->title = 'Update Data Korban: ';
$this->params['breadcrumbs'][] = ['label' => 'T-Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_korban, 'url' => ['view', 'nama_korban' => $model->nama_korban]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tkorban-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>