<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;
use app\models\TKorban;
use app\models\TPelaku;

$pdf = new Pdf([
    'format' => array(210, 297), //ini ukuran kertas dalam mm210 x 297
    //'format' => Pdf::FORMAT_A4, //ini ukuran kertas dalam mm210 x 297
    'mode' => Pdf::MODE_UTF8,
    // 'orientation' => Pdf::ORIENT_PORTRAIT, //orientasi kertas protrait
    'marginTop' => '10', //20mm
    'marginBottom' => '20', //20mm
    'marginLeft' => '25.4', //20mm
    'marginRight' => '25.4', //20mm
    'defaultFont' => 'Calibri',
    //'defaultFontSize' => '12'
]);
$mpdf = $pdf->api;

//header

$imgPath = Yii::getAlias('@app') . '/img';

$html = '';

$html .= '
        <table width = 100% border ="0" width = 100% >    
            <tr>
                <td rowspan="5" align="left" style="width: 32mm;padding: top -3px;padding: bottom -3px">' . Html::img($imgPath . '/pariamanlogo.png', ['height' => '30mm']) . '</td>
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

$no_register = $model->no_register;

$tanggal_kejadian = $model->tanggal_kejadian;
$tgl_kjdn = $model->tglIndo($tanggal_kejadian);

$tanggal_pelaporan = $model->tanggal_pelaporan;
$tgl_plprn = $model->tglIndo($tanggal_pelaporan);

$kategori_kasus = $model->kategori ? $model->kategori->nama_kategori : '-';

$deskripsi_kasus = $model->deskripsi_kasus;

$tkp = $model->tkp;

$desa_kelurahan = $model->desa_kelurahan;

$kab_kota = $model->kab_kota;

$pelayanan = $model->pelayanan;


//T-Kasus
$html .= '
        <table>
            <tr>
                <th align="lift" style="font-size:12pt ; height:10px; padding:0px">DATA KASUS</th>
            </tr>
            <tr>
                <td>No. Register Kasus<td>
                <td> : </td>
                <td><b> ' . $no_register . '</b></td>
            </tr>
            <tr>
                <td>Tanggal Kejadian<td>
                <td> : </td>
                <td> '.$tgl_kjdn.' </td>
            </tr>
            <tr>
                <td>Tanggal Pelaporan<td>
                <td> : </td>
                <td> '.$tgl_plprn.' </td>
            </tr>
            <tr>
                <td>Kategori Kasus<td>
                <td> : </td>
                <td> '.$kategori_kasus.' </td>
            </tr>

            <tr>
                <td>Deskripsi Kasus<td>
                <td> : </td>
                <td> '.$deskripsi_kasus.' </td>
            </tr>
            <tr>
                <td>TKP<td>
                <td> : </td>
                <td> '.$tkp.' </td>
            </tr>
            <tr>
                <td>Desa/Kelurahan<td>
                <td> : </td>
                <td> '.$desa_kelurahan.' </td>
            </tr>
            <tr>
                <td>Kab/Kota<td>
                <td> : </td>
                <td> '.$kab_kota.' </td>
            </tr>
        </table>
        <br>
    ';



//T-Korban
    $html .= '
            <table>
                <tr>
                    <th align="lift" style="font-size:12pt ; height:10px; padding:0px">DATA KORBAN</th>
                </tr>
            </table>
            <table width=100% border=1>
                <tr>
                    <td><b>No. </b></td>
                    <td><b>Nama </b></td>
                    <td><b>TTL & Usia </b></td>
                    <td><b>Alamat </b></td>
                    <td><b>Pelayanan </b></td>
                </tr>
    ';
    $no = 1;
     $getTKorban = TKorban::find()
        ->where(['id_kasus'=>$model->id_kasus])
        ->all();
    foreach ($getTKorban as $tkor) {
        $jkel = $tkor->jenis_kelamin;
            if ($jkel == 1) {
                $jk = 'Laki-laki';
            } elseif ($jkel == 2) {
                $jk = 'Perempuan';
            } else {
                $jk = '';
            } 
    $html .= '
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$tkor->nama_korban.'<br>NIK: '.$tkor->nik.'<br>JK: '.$jk.'</td>
                    <td>'.$tkor->tempat_lahir.', '.$tkor->tanggal_lahir.'<br>Usia: '.$tkor->umur_korban.' Tahun</td>
                    <td>'.$tkor->alamat_korban.'</td>
                    <td><b>Pelayanan: </b>'.$pelayanan.' <br> <b>Deskripsi: </b>'.$deskripsi_kasus.'</td>
                </tr>
    ';
    }
    $html .='

            </table>
            <br>
    ';

//T-Pelaku
    $html .= '
            <table>
                <tr>
                    <th align="lift" style="font-size:12pt ; height:10px; padding:0px">DATA Pelaku</th>
                </tr>
            </table>
            <table width=100% border=1>
                <tr>
                    <td><b>No. </b></td>
                    <td><b>Nama </b></td>
                    <td><b>Jenis Kelamin</b></td>
                    <td><b>Usia</b></td>
                    <td><b>Alamat </b></td>
                    <td><b>Hubungan dengan Korban </b></td>
                </tr>
    '; 
    $no = 1;
    $getTPelaku = TPelaku::find()
       ->where(['id_kasus'=>$model->id_kasus])
       ->all();
    foreach ($getTPelaku as $tpel) {
        $jkel = $tpel->jenis_kelamin_pelaku;
                if ($jkel == 1) {
                    $jk = 'Laki-laki';
                } elseif ($jkel == 2) {
                    $jk = 'Perempuan';
                } else {
                    $jk = '';
                } 
   $html .='
            <tr>
                <td>'.$no++.'</td>
                <td>'.$tpel->nama_pelaku.'</td>
                <td>'.$jk.'</td>
                <td>'.$tpel->umur_pelaku.' Tahun</td>
                <td>'.$tpel->alamat_pelaku.'</td>
                <td>'.$tpel->hub_korban.'</td>
            </tr>
   ';
}
$html .='

        </table>
';

// echo $html;

$mpdf->WriteHTML($html);
$mpdf->Output('T-Kasus' . '.pdf', 'I');
exit;

?>