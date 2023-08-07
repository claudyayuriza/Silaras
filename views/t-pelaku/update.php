<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TPelaku $model */

$this->title = 'Update Data Pelaku: ';
$this->params['breadcrumbs'][] = ['label' => 'T Pelaku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pelaku, 'url' => ['view', 'nama_pelaku' => $model->nama_pelaku]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpelaku-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>