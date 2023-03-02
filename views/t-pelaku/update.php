<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TPelaku $model */

$this->title = 'Update T Pelaku: ' . $model->id_pelaku;
$this->params['breadcrumbs'][] = ['label' => 'T Pelakus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelaku, 'url' => ['view', 'id_pelaku' => $model->id_pelaku]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tpelaku-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
