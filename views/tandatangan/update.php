<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tandatangan $model */

$this->title = 'Update Data Penandatangan: ';
$this->params['breadcrumbs'][] = ['label' => 'Tanda tangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nip, 'url' => ['view', 'nip' => $model->nip]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tandatangan-update">

    <!-- <h1><= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>