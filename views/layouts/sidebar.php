<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <center>
            <?= Html::img(Url::base() . '/img/silarasp.png', ['class' => 'img-responsive', 'width' => 180]); ?>
        </center>

        <!-- <span class="brand-text font-weight-light">SILARAS</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?= Html::img(Url::base() . '/img/pariamanlogo1.png', ['class' => 'img-circle elevation-2', 'alt' => 'User Image']); ?>

            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->isGuest == false ? Yii::$app->user->identity->profile->full_name : 'Guest' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $roleName = Yii::$app->user->isGuest == false ? Yii::$app->user->identity->role->name : '';
            // echo \hail812\adminlte\widgets\Menu::widget([

            if (Yii::$app->user->isGuest == false && $roleName == 'Admin') {
                $items = [
                    ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/site/index']], // menu dashboard, icon nya tachometer-alt
                    ['label' => 'Data Kasus', 'url' => ['/t-kasus'], 'icon' => ' fa-suitcase'],
                    ['label' => 'Data Korban', 'url' => ['/t-korban'], 'icon' => ' fa-user-injured'],
                    ['label' => 'Data Pelaku', 'url' => ['/t-pelaku'], 'icon' => ' fa-user-secret'],
                    ['label' => 'Kategori Kasus', 'url' => ['/kategori'], 'icon' => ' fa-list-alt'],
                    [
                        'label' => 'Rekap Data Kasus',
                        'icon' => 'folder',
                        'url' => '#',
                        // 'badge' => '<span class="right badge badge-info">2</span>',
                        "items" => [
                            ['label' => 'Rekap Bulanan', 'url' => ['/t-kasus/rekap-kasus-bulanan'], "icon" => "file-pdf"],
                            ['label' => 'Rekap Tahunan', 'url' => ['/t-kasus/rekap-kasus-tahunan'], "icon" => "file-pdf"],
                            ['label' => 'Penandatanganan', 'url' => ['/tandatangan'], "icon" => "file-signature"],
                        ]
                    ],
                    ['label' => 'Manajemen User', 'url' => ['/user/admin'], 'icon' => ' fa-users'],
                    ['label' => 'Profil User', 'url' => ['/user/profile'], 'icon' => 'user'],
                    ['label' => 'Info Akun', 'url' => ['/user/account'], 'icon' => 'lock'],
                ];
            } else if (Yii::$app->user->isGuest == false && $roleName == 'User') {
                $items = [
                    ['label' => 'Beranda', 'icon' => 'home', 'url' => ['/site/index-reg']],
                    ['label' => 'Data Kasus', 'icon' => 'far fa-briefcase', 'url' => ['/t-kasus']],
                    ['label' => 'Data Korban', 'icon' => 'fas fa-user-injured', 'url' => ['/t-korban']],
                    ['label' => 'Data Pelaku', 'icon' => 'fal fa-user-secret', 'url' => ['/t-pelaku']],
                    ['label' => 'Profil User', 'icon' => 'fa-fw fa-user', 'url' => ['/user/profile']],
                    ['label' => 'Akun User', 'icon' => 'fa-fw fa-users', 'url' => ['/user/account']],
                ];
            }
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => $items,
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>