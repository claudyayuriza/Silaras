<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TKasus $model */

// $this->title = 'Update T-Kasus: ' . $model->id_kasus;
$this->title = 'Update T-Kasus: ' . $model->no_register;
$this->params['breadcrumbs'][] = ['label' => 'T Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kasus, 'url' => ['view', 'id_kasus' => $model->id_kasus]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tkasus-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
