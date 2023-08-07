<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tandatangan $model */

$this->title = 'Tambah Data Penandatangan ';
$this->params['breadcrumbs'][] = ['label' => 'Tanda tangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tandatangan-create">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>