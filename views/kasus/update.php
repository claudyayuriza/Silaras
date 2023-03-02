<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kasus $model */

$this->title = 'Update Kasus: ' . $model->no_register;
$this->params['breadcrumbs'][] = ['label' => 'Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->no_register, 'url' => ['view', 'no_register' => $model->no_register]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kasus-update">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
