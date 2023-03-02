<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Kategori $model */

$this->title = $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-view">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->
    <!-- <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Lunch</div> -->

    <div class="card card-outline card-info">
        <div class="card-header">
        <p class="card-title" style="font-size: 20px;">Kategori</p>
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'id_kategori' => $model->id_kategori], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i>  Delete', ['delete', 'id_kategori' => $model->id_kategori], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'id_kategori' => $model->id_kategori], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 15%;"><b>Id Kategori</b></td>
                            <td><?= $model->id_kategori ?></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"><b>Nama Kategori</b></td>
                            <td><?= $model->nama_kategori ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- <= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_kategori',
            'nama_kategori',
        ],
    ]) ?> -->


