<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

use app\models\TKorban;
use app\models\TPelaku;
use app\models\Tandatangan;

$pdf = new Pdf([
    'format' => array(210, 297), //ini ukuran kertas dalam mm210 x 297
    //'format' => Pdf::FORMAT_A4, //ini ukuran kertas dalam mm210 x 297
    // 'mode' => Pdf::MODE_UTF8,
    'orientation' => Pdf::ORIENT_LANDSCAPE, //orientasi kertas landscape
    'marginTop' => '10', //20mm
    'marginBottom' => '20', //20mm
    'marginLeft' => '25.4', //20mm
    'marginRight' => '25.4', //20mm
    'defaultFont' => 'Calibri',
    //'defaultFontSize' => '12'
]);
$mpdf = $pdf->api;

$nmbulan = $searchModel->bulan;
if ($nmbulan == '01') {
    $bulanindo = "Januari";
} elseif ($nmbulan == '02') {
    $bulanindo = "Februari";
} elseif ($nmbulan == '03') {
    $bulanindo = "Maret";
} elseif ($nmbulan == '04') {
    $bulanindo = "April";
} elseif ($nmbulan == '05') {
    $bulanindo = "Mei";
} elseif ($nmbulan == '06') {
    $bulanindo = "Juni";
} elseif ($nmbulan == '07') {
    $bulanindo = "Juli";
} elseif ($nmbulan == '08') {
    $bulanindo = "Agustus";
} elseif ($nmbulan == '09') {
    $bulanindo = "September";
} elseif ($nmbulan == '10') {
    $bulanindo = "Oktober";
} elseif ($nmbulan == '11') {
    $bulanindo = "November";
} elseif ($nmbulan == '12') {
    $bulanindo = "Desember";
} else {
    $bulanindo = "";
}


//header


$html = '';


$html .= '
        <table width = 100% border ="0" width = 100% >    
            <tr>
                <td rowspan="5" align="left" style="width: 32mm;padding: top -3px;padding: bottom -3px">' . Html::img(Yii::$app->basePath . '/img/pariamanlogo.png', ['height' => '25mm']) . '</td>
                <td align="center" style="height:5px ; font: size 12pt; padding:0px">PEMERINTAHAN KOTA PARIAMAN</td>
            </tr>
            <tr>
                <th align="center" style="font-size:14pt ; height:10px; padding:0px">DINAS PEMBERDAYAAN PEREMPUAN PERLINDUNGAN ANAK DAN KELUARGA BENCANA (DP3AKB)</th>
            </tr>
            <tr>
                <td align="center" style="font-size:9pt; height: 10px; padding:0px">
                    Alamat: Jl. Siti Manggopoh No.Kel,Naras Hilir,Kec. Pariaman Utara, Kota Pariaman,
                    Sumatera Barat 25522 <br>
                    Website : //dp3akb.pariamankota.go.id E-mail:dp3akb@pariamankota.go.id
                </td>
            </tr>
        </table>

        <hr><br>
    ';

$html .= '
    <center>
    <h3>
    <b>REKAP KASUS BULAN : ' . strtoupper($bulanindo) . ' ' . $searchModel->tahun . '</b>
    </h3>
    </center>
    <br>
    ';

$html .= '
    <table width = 100% border = "1">
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Reg</th>
                <th>Tanggal Laporan $amp; Kejadian</th>
                <th>Korban</th>
                <th>Pelaku</th>
                <th>Ket. Kasus</th>
            </tr>
        </thead>
    <tbody>
';

$no = 1;
foreach ($rekap as $row) {

    $kejadian = date('d-m-Y', strtotime($row->tanggal_kejadian));
    $pelaporan = date('d-m-Y', strtotime($row->tanggal_pelaporan));

    $getKorbanPerKasus = TKorban::find()
        ->where(['id_kasus' => $row->id_kasus])
        ->one();

    $namakorban = $getKorbanPerKasus ? $getKorbanPerKasus->nama_korban : '<i>data belum diinputkan</i>';
    $nikkorban = $getKorbanPerKasus ? $getKorbanPerKasus->nik : '<i>data belum diinputkan</i>';
    $umurkorban = $getKorbanPerKasus ? $getKorbanPerKasus->umur_korban : '<i>data belum diinputkan</i>';

    $getPelakuPerKasus = TPelaku::find()
        ->where(['id_kasus' => $row->id_kasus])
        ->one();

    $namapelaku = $getPelakuPerKasus ? $getPelakuPerKasus->nama_pelaku : '<i>data belum diinputkan</i>';
    $nikpelaku = $getPelakuPerKasus ? $getPelakuPerKasus->nik : '<i>data belum diinputkan</i>';
    $umurpelaku = $getPelakuPerKasus ? $getPelakuPerKasus->umur_pelaku : '<i>data belum diinputkan</i>';
    $hubdgkorban = $getPelakuPerKasus ? $getPelakuPerKasus->hub_korban : '<i>data belum diinputkan</i>';

    $status = $row->status_kasus;
    if ($status == 1) {
        $e_status = '<b>Diproses</b>';
        $layanan = '<i>masih di proses</i>';
        $dekrip_layanan = '<i>masih di proses</i>';
    } elseif ($status == 2) {
        $e_status = '<b>Selesai Diproses</b>';
        $layanan = $row->pelayanan;
        $dekrip_layanan = $row->deskripsi_pelayanan;
    } else {
        $e_status = '-';
        $layanan = '-';
        $dekrip_layanan = '-';
    }

    $html .= '
    <tr>
        <td>' . $no++ . '</td>
        <td>' . $row->no_register . '</td>
        <td>Kejadian: ' . $kejadian . '<br>Pelaporan: ' . $pelaporan . '</td>
        <td>
            Nama Korban: ' . $namakorban . ' <br>
            NIK: ' . $nikkorban . ' <br>
            Umur: ' . $umurkorban . ' tahun
        </td>
        <td>
            Nama Pelaku: ' . $namapelaku . ' <br>
            NIK: ' . $nikpelaku . ' <br>
            Umur: ' . $umurpelaku . ' tahun <br>
            Hub. dengan Korban: ' . $hubdgkorban . '
        </td>
        <td>
            Status Kasus: ' . $e_status . '<br>
            Pelayanan yang diberikan: ' . $layanan . ' <br>
            Deskripsi Pelayanan: ' . $dekrip_layanan . '
        </td>
    </tr>
';
}
$html .= '
        </tbody>
    </table>
';

$ttd = Tandatangan::find()->one();
$html .= '
    <br>
        <table width="100%" style="font-size: 18px">
            <tr>
                <td width="62%"></td>
                <td width="38%">
                    <center>
                        <p>Pariaman, ' . date('d-M-Y') . '</p>
                        <p style ="text-transform : capitalize;">diketahui oleh"</p>
                        ' . $ttd->jabatan . '
                        <br><br><br><br><br>
                        <b>' . $ttd->nama_pejabat . '<b><br>
                        <p>Nip. ' . $ttd->nip . '</p>
                    </center>
                </td>
            </tr>
        </table>
';

// echo $html;

$mpdf->WriteHTML($html);
$mpdf->Output('RekapKasusBulanan' . $searchModel->bulan . '.pdf', 'I');
