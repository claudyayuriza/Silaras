<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tandatangan $model */

$this->title = 'Detail Data Penandatangan';
$this->params['breadcrumbs'][] = ['label' => 'Tanda tangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tandatangan-view">
    <div class="card card-outline card-info">
        <div class="card-header">
            <p class="card-title" style="font-size: 20px;">Data Penandatangan</p>
            <div class="card-tools">
                <?= Html::a('<i class="fa fa-fw fa-pen"></i> Update', ['update', 'id_pejabat' => $model->id_pejabat], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<i class="fa fa-fw fa-trash"></i>  Delete', ['delete', 'id_pejabat' => $model->id_pejabat], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('<i class="fa fa-fw fa-sign-out-alt"></i> Kembali', ['index', 'id_pejabat' => $model->id_pejabat], ['class' => 'btn btn-warning']) ?>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td style="width: 15%;"><b>NIP Pejabat</b></td>
                            <td><?= $model->nip ?></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"><b>Nama Pejabat</b></td>
                            <td><?= $model->nama_pejabat ?></td>
                        </tr>
                        <tr>
                            <td style="width: 15%;"><b>Jabatan</b></td>
                            <td><?= $model->jabatan ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <h1><= Html::encode($this->title) ?></h1> -->

<!-- <p>
                        <= Html::a('Update', ['update', 'id_pejabat' => $model->id_pejabat], ['class' => 'btn btn-primary']) ?>
                        <= Html::a('Delete', ['delete', 'id_pejabat' => $model->id_pejabat], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_pejabat',
                            'nip',
                            'nama_pejabat',
                            'jabatan',
                        ],
                    ]) ?> -->