<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TKorban $model */

$this->title = 'Tambah Data Pribadi Korban';
$this->params['breadcrumbs'][] = ['label' => 'Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tkorban-create">

    <h1><?php // echo = Html::encode($this->title) 
        ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>