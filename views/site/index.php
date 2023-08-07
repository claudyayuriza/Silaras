<?php

use yii\helpers\Html;
use yii\helpers\Url;
use miloschuman\highcharts\Highcharts;

use app\models\TKasus;
use app\models\TKorban;
use app\models\TPelaku;
use app\models\Kategori;

$this->title = 'SILARAS - Beranda';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>

<h5 class="mb-2">SILARAS - Sistem Informasi Layanan Pengaduan Kekerasan Terhadap Perempuan dan Anak</h5>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    <?php
                    echo $jumlah = TKasus::find()
                        ->where(['status_kasus' => 2])
                        ->count();
                    ?>
                </h3>
                <p>Jumlah Kasus</p>
            </div>
            <div class="icon">
                <i class="fas fa-briefcase"></i>
            </div>
            <?= Html::a('Selengkapnya <i class="fas fa-arrow-circle-right"></i>', ['t-kasus/index'], ['class' => 'small-box-footer']) ?>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    <?php
                    echo $korban = TKorban::find()->count();
                    ?>
                </h3>
                <p>Jumlah Korban</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-injured"></i>
            </div>
            <?= Html::a('Selengkapnya <i class="fas fa-arrow-circle-right"></i>', ['t-korban/index'], ['class' => 'small-box-footer']) ?>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    <?php
                    echo $pelaku = TPelaku::find()->count();
                    ?>
                </h3>
                <p>Jumlah Pelaku</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-secret"></i>
            </div>
            <?= Html::a('Selengkapnya <i class="fas fa-arrow-circle-right"></i>', ['t-pelaku/index'], ['class' => 'small-box-footer']) ?>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    <?php
                    echo $kat = Kategori::find()->count();
                    ?>
                </h3>
                <p>Jenis Kasus</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <?= Html::a('Selengkapnya <i class="fas fa-arrow-circle-right"></i>', ['kategori/index'], ['class' => 'small-box-footer']) ?>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Jumlah Kasus Berdasarkan Kategori Kasus</h3>
            </div>

            <div class="card-body">
                <?php

                $jumlah = (new \app\models\TKasusSearch)->TotalKasusbyYear();
                // print_r($jumlah);
                $kategori = [];
                $jumlahkasus = [];
                foreach ($jumlah as $row) {
                    $kategori[] = $row['nama_kategori'];
                    $jumlahkasus[] = (int)$row['jumlahkasus'];
                }
                // print_r($kategori);
                echo Highcharts::widget([
                    'options' => [
                        'chart' =>  [
                            'type' => 'column'
                        ],
                        'title' => ['text' => 'Grafik Jumlah Kasus pada Tahun ' . date('Y')],
                        'xAxis' => [
                            'categories' => $kategori,
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Jumlah Kasus']
                        ],
                        'series' => [
                            ['name' => 'Tahun ' . date('Y'), 'data' => $jumlahkasus],
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Korban Berdasarkan Jenis Kelamin</h3>
            </div>

            <div class="card-body">
                <?php
                $jumlah = (new \app\models\TKorbanSearch)->TotalKorbanbyYear();
                echo Highcharts::widget([
                    'options' => [
                        'chart' =>  [
                            'type' => 'pie'
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>'
                        ],
                        'plotOptions' => [
                            'pie' => [
                                'size' => 200
                            ]
                        ],
                        'title' => ['text' => 'Fruit Consumption'],
                        'series' => [
                            [
                                'name' => 'Brands',
                                'data' => [
                                    ['name' => 'Laki-Laki', 'y' => 1],
                                    ['name' => 'Perempuan', 'y' => 1]
                                ]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h3 class="card-title">Pelaku Berdasarkan Jenis Kelamin</h3>
            </div>

            <div class="card-body">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Fruit Consumption'],
                        'xAxis' => [
                            'categories' => ['Apples', 'Bananas', 'Oranges']
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Fruit eaten']
                        ],
                        'series' => [
                            ['name' => 'Jane', 'data' => [1, 0, 4]],
                            ['name' => 'John', 'data' => [5, 7, 3]]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
</div>