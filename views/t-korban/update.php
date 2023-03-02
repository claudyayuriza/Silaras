<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */

$this->title = 'Update Data T-Korban: ' . $model->id_korban;
$this->params['breadcrumbs'][] = ['label' => 'T-Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_korban, 'url' => ['view', 'id_korban' => $model->id_korban]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tkorban-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
