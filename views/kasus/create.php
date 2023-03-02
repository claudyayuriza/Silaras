<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Kasus $model */

$this->title = 'Tambah Kasus';
$this->params['breadcrumbs'][] = ['label' => 'Kasus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kasus-create">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
