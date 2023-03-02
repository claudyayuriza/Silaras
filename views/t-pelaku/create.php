<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TPelaku $model */

$this->title = 'Create T Pelaku';
$this->params['breadcrumbs'][] = ['label' => 'T Pelakus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tpelaku-create">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
