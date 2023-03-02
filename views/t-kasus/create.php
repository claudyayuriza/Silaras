<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TKasus $model */

$this->title = 'Tambah Data T-Kasus';
$this->params['breadcrumbs'][] = ['label' => 'T Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tkasus-create">

    <h1><?php // echo= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
