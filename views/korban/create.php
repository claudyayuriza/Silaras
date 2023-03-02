<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Korban $model */

$this->title = 'Create Korban';
$this->params['breadcrumbs'][] = ['label' => 'Korban', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="korban-create">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
