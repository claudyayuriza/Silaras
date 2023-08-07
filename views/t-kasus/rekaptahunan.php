<?php

use app\models\TKorban;
use app\models\TPelaku;

$this->title = 'Rekap Kasus Bulanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search_tahunan', ['model' => $searchModel]); ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 10px">#</th>
            <th>No. Register Kasus</th>
            <th>Tanggal Lapor dan Kejadian</th>
            <th>Korban</th>
            <th>Pelaku</th>
            <th>Status Kasus</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        foreach ($rekap as $row) {
            $getKorbanPerKasus = TKorban::find()
                ->where(['id_kasus' => $row->id_kasus])
                ->one();

            $getPelakuPerKasus = TPelaku::find()
                ->where(['id_kasus' => $row->id_kasus])
                ->one();
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->no_register ?></td>
                <td>
                    <?php
                    $kejadian = date('d-m-Y', strtotime($row->tanggal_kejadian));
                    $pelaporan = date('d-m-Y', strtotime($row->tanggal_pelaporan));

                    echo 'Pelaporan: <b>' . $pelaporan . '</b><br>Kejadian: <b>' . $kejadian . '</b>';
                    ?>
                </td>
                <td>
                    <?php
                    $namakorban = $getKorbanPerKasus ? $getKorbanPerKasus->nama_korban : '<i>data belum diinputkan</i>';
                    $nikkorban = $getKorbanPerKasus ? $getKorbanPerKasus->nik : '<i>data belum diinputkan</i>';
                    $umurkorban = $getKorbanPerKasus ? $getKorbanPerKasus->umur_korban : '<i>data belum diinputkan</i>';

                    echo 'Nama: ' . $namakorban . '<br> NIK: ' . $nikkorban . '<br> Umur: ' . $umurkorban;
                    ?>
                </td>
                <td>
                    <?php
                    $namapelaku = $getPelakuPerKasus ? $getPelakuPerKasus->nama_pelaku : '<i>data belum diinputkan</i>';
                    $nikpelaku = $getPelakuPerKasus ? $getPelakuPerKasus->nik : '<i>data belum diinputkan</i>';
                    $umurpelaku = $getPelakuPerKasus ? $getPelakuPerKasus->umur_pelaku : '<i>data belum diinputkan</i>';
                    $hubdgkorban = $getPelakuPerKasus ? $getPelakuPerKasus->hub_korban : '<i>data belum diinputkan</i>';

                    echo 'Nama: ' . $namapelaku . '<br> NIK: ' . $nikpelaku . '<br> Umur: ' . $umurpelaku . '<br> Hub. dengan Korban: ' . $hubdgkorban;
                    ?>
                </td>
                <td>
                    <?php
                    $status = $row->status_kasus;
                    if ($status == 1) {
                        $e_status = '<span class="right badge badge-warning">Diproses</span>';
                        $layanan = '<i>masih di proses</i>';
                        $dekrip_layanan = '<i>masih di proses</i>';
                    } elseif ($status == 2) {
                        $e_status = '<span class="right badge badge-success">Selesai Diproses</span>';
                        $layanan = $row->pelayanan;
                        $dekrip_layanan = $row->deskripsi_pelayanan;
                    } else {
                        $e_status = '-';
                        $layanan = '-';
                        $dekrip_layanan = '-';
                    }

                    echo 'Status Kasus: ' . $e_status . '<br> Pelayanan yang diberikan: <b>' . $layanan . '</b><br> Dekripsi Layanan: <b>' . $dekrip_layanan . '</b>';
                    ?>
                </td>

            </tr>

        <?php } ?>
    </tbody>
</table>