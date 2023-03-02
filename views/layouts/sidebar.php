<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>SILARAS</b></span> 
        <!-- menampilkan nama proyek yang ada di bagian atas menu -->
    </a>

    <!-- Sidebar, menampilkan nama proyek, nama admin, dan menu menu halaman -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hafizhatul Husna</a>
                <!-- menampilkan nama admin nantinya yang berada di atas menu -->
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'tachometer-alt'], // menu dashboard, icon nya tachometer-alt
                    ['label' => 'Korban', 'url' => ['/korban'], 'icon' => ' fa-users'], // menu korban, url nya menuju ke tabel korban, icon nya fa-user
                    ['label' => 'Kasus', 'url' => ['/kasus'], 'icon' => ' fa-users'],
                    ['label' => 'Kategori', 'url' => ['/kategori'], 'icon' => ' fa-users'],
                    ['label' => 'T-Kasus', 'url' => ['/t-kasus'], 'icon' => ' fa-users'],
                    ['label' => 'T-Korban', 'url' => ['/t-korban'], 'icon' => ' fa-users'],
                    ['label' => 'T-Pelaku', 'url' => ['/t-pelaku'], 'icon' => ' fa-users'],
                    // [
                    //     'label' => 'Starter Pages',
                    //     'icon' => 'tachometer-alt',
                    //     'badge' => '<span class="right badge badge-info">2</span>',
                    //     'items' => [
                    //         ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                    //         ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                    //     ]
                    // ],
                    // ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    // ['label' => 'Yii2 PROVIDED', 'header' => true],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    // ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    // ['label' => 'Level1'],
                    
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>