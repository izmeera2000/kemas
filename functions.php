<?php
include 'assets/vendor/autoload.php';

use chillerlan\QRCode\{QRCode, QROptions};
use chillerlan\QRCode\Common\EccLevel;
use chillerlan\QRCode\Data\QRMatrix;
use chillerlan\QRCode\Output\{QRGdImagePNG, QRCodeOutputException};
use chillerlan\QRCode\Output\QROutputInterface;
use setasign\Fpdi\Fpdi;
use Dotenv\Dotenv;

$filesec = __DIR__ . '/../';
// echo $filesec;
$dotenv = Dotenv::createImmutable($filesec);
$dotenv->load($filesec);

session_start();
// initializing variables
$username = "";
$email = "";
$errors = array();
$errors2 = array();

// connect to the database
$db = mysqli_connect($_ENV['DB_HOST_KEMAS'], $_ENV['DB_USER_KEMAS'], $_ENV['DB_PASSWORD_KEMAS'],$_ENV['DB_DATABASE_KEMAS']);



include 'pagefunctions/staf.php';
include 'pagefunctions/ibubapa.php';
include 'pagefunctions/borangkemasukan.php';



if (isset($_GET['logout'])) {
    session_destroy();
    header("location: lamanutama.php");
}


function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


function createqr($qr)
{
    class QRImageWithLogo extends QRGdImagePNG
    {

        /**
         * @param string|null $file
         * @param string|null $logo
         *
         * @return string
         * @throws \chillerlan\QRCode\Output\QRCodeOutputException
         */
        public function dump(string $file = null, string $logo = null): string
        {
            // set returnResource to true to skip further processing for now
            $this->options->returnResource = true;

            // of course you could accept other formats too (such as resource or Imagick)
            // i'm not checking for the file type either for simplicity reasons (assuming PNG)
            if (!is_file($logo) || !is_readable($logo)) {
                throw new QRCodeOutputException('invalid logo');
            }

            // there's no need to save the result of dump() into $this->image here
            parent::dump($file);

            $im = imagecreatefrompng($logo);

            // get logo image size
            $w = imagesx($im);
            $h = imagesy($im);

            // set new logo size, leave a border of 1 module (no proportional resize/centering)
            $lw = ($this->options->logoSpaceWidth - 2) * $this->options->scale;
            $lh = ($this->options->logoSpaceHeight - 2) * $this->options->scale;

            // get the qrcode size
            $ql = $this->matrix->size() * $this->options->scale;

            // scale the logo and copy it over. done!
            imagecopyresampled($this->image, $im, ($ql - $lw) / 2, ($ql - $lh) / 2, 0, 0, $lw, $lh, $w, $h);

            $imageData = $this->dumpImage();

            if ($file !== null) {
                $this->saveToFile($imageData, $file);
            }

            if ($this->options->imageBase64) {
                $imageData = $this->toBase64DataURI($imageData, 'image/' . $this->options->outputType);
            }

            return $imageData;
        }

    }

    /*
     * Runtime
     */

    $options = new QROptions([
        'version' => 5,
        'eccLevel' => EccLevel::H,
        'imageBase64' => true,
        'addLogoSpace' => true,
        'logoSpaceWidth' => 13,
        'logoSpaceHeight' => 13,
        'scale' => 6,
        'imageTransparent' => false,
        'drawCircularModules' => true,
        'circleRadius' => 0.45,
        'keepAsSquare' => [QRMatrix::M_FINDER, QRMatrix::M_FINDER_DOT],
    ]);

    $qrcode = new QRCode($options);
    $qrcode->addByteSegment($qr);

    // header('Content-type: image/png');

    $qrOutputInterface = new QRImageWithLogo($options, $qrcode->getMatrix());

    // dump the output, with an additional logo
    // the logo could also be supplied via the options, see the svgWithLogo example
    echo $qrOutputInterface->dump(null, 'assets/img/android-chrome-192x192.png');

    // exit;
}





if (isset($_POST['profilmurid'])) {
    $_SESSION['idmurid'] = $_POST['studentid'];
    header('location: profilmurid.php');

}

if (isset($_POST['pemarkahan'])) {
    $_SESSION['idmurid'] = $_POST['studentid'];
    header('location: pemarkahan.php');


}

if (isset($_POST['tambahpemarkahan'])) {
    // $_SESSION['idmurid'] = $_POST['studentid'];
    // header('location: pemarkahan.php');
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key . " : " . $value);
    }
    $ic = $_POST['murid_id'];
    // $tarikh = $_POST['tarikh'];

    $bm1 = $_POST['bm1'];
    $bm2 = $_POST['bm2'];
    $bm3 = $_POST['bm3'];
    $bi1 = $_POST['bi1'];
    $bi2 = $_POST['bi2'];
    $bi3 = $_POST['bi3'];
    $pi1 = $_POST['pi1'];
    $pi2 = $_POST['pi2'];
    $pi3 = $_POST['pi3'];
    $pi4 = $_POST['pi4'];
    $pi5 = $_POST['pi5'];
    $pi6 = $_POST['pi6'];
    $keterampilan = $_POST['keterampilan'];
    $perkem1 = $_POST['perkem1'];
    $perkem2 = $_POST['perkem2'];
    $perkem3 = $_POST['perkem3'];
    $perkem4 = $_POST['perkem4'];
    $perkem5 = $_POST['perkem5'];
    $perkem6 = $_POST['perkem6'];
    $kreativ1 = $_POST['kreativ1'];
    $kreativ2 = $_POST['kreativ2'];
    $sainsawal1 = $_POST['sainsawal1'];
    $sainsawal2 = $_POST['sainsawal2'];
    $matematikawal1 = $_POST['matematikawal1'];
    $matematikawal2 = $_POST['matematikawal2'];
    $matematikawal3 = $_POST['matematikawal3'];
    $matematikawal4 = $_POST['matematikawal4'];
    $matematikawal5 = $_POST['matematikawal5'];
    $matematikawal6 = $_POST['matematikawal6'];
    $kemanusiaan = $_POST['kemanusiaan'];
    $catatan = $_POST['catatan'];

    $namastaf = $_SESSION['username'];

    $query = "SELECT * FROM staf_profile WHERE idpengguna='$namastaf' ";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        while ($row = mysqli_fetch_assoc($results)) {

            $namastaf = $row['nama'];

        }
    }
    $query = "INSERT INTO pemarkahan  (murid_id,idpengguna,bm1,bm2,bm3,bi1,bi2,bi3,pi1,pi2,pi3,pi4,pi5,pi6,keterampilan,perkem1,perkem2,perkem3,perkem4,perkem5,perkem6,kreativ1,kreativ2,sainsawal1,sainsawal2,matematikawal1,matematikawal2,matematikawal3,matematikawal4,matematikawal5,matematikawal6,kemanusiaan,catatan)
    VALUES('$ic','$namastaf', '$bm1','$bm2','$bm3','$bi1','$bi2','$bi3','$pi1','$pi2','$pi3','$pi4','$pi5','$pi6','$keterampilan','$perkem1','$perkem2','$perkem3','$perkem4','$perkem5','$perkem6','$kreativ1','$kreativ2','$sainsawal1','$sainsawal2','$matematikawal1','$matematikawal2','$matematikawal3','$matematikawal4','$matematikawal5','$matematikawal6','$kemanusiaan','$catatan')";
    $result = mysqli_query($db, $query);
    header('location: pemarkahan.php');
    exit();

}





if (isset($_POST['tahunpemarkahan'])) {
    if (isset($_POST['tahun'])) {
        $_SESSION['tahundipilih'] = $_POST['tahun'];
    }

}

if (isset($_POST['download-pdf'])) {
    require('assets/vendor/fpdf/fpdf.php');
    require('assets/vendor/fpdi/src/autoload.php');

    require('assets/vendor/fpdf/exfpdf.php');
    require('assets/vendor/fpdf/easyTable.php');







    // Instanciation of inherited class
    $pdf = new exFPDF('P', 'mm', 'A4');
    $pdf->Footer();

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    // for($i=1;$i<=40;$i++)
    $tableb = new easyTable($pdf, '%{100}', 'border:0;font-size:10;');

    $tableb->easyCell('Laporan Pemarkahan', 'valign:M;  align:C');
    $tableb->printRow();
    $tableb->endTable();

    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial', '', 10);


    $tablea = new easyTable($pdf, '%{20, 20, 60}', 'border:1;font-size:10;');
    $id = $_POST['id'];
    $tarikh = $_POST['tahun'];
    $tarikh2 = $_POST['tahun'];
    $query = "SELECT * FROM murid WHERE id='$id'  LIMIT 1 ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $icmurid = $row['no_kad_pengenalan'];

        $tablea->easyCell('Nama', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['name'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('No. MyKid', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['no_kad_pengenalan'], 'valign:M;, 255;align:L');
        $tablea->printRow();

        $tablea->easyCell('Jantina', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['jantina'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('Umur', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['age'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        // $tablea->easyCell('Kelas', 'valign:M; bgcolor:#d9d8d4;  align:L');
        // $tablea->easyCell('Nama', 'valign:M;, 255;align:L');
        // $tablea->printRow();
    }


    $query = "SELECT * FROM pemarkahan WHERE murid_id='$id' AND tarikh LIKE '%$tarikh%' LIMIT 1 ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $tablea->easyCell('Nama Guru', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['idpengguna'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('Tarikh Pelaporan', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['tarikh'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->endTable(10);

        $table = new easyTable($pdf, '%{20, 20, 60}', 'border:1;font-size:12;');

        $table->easyCell('<b>Komponen</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->easyCell('<b>Kemahiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->easyCell('<b>Tafsiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->printRow(true);

        $table->easyCell('<b>BAHASA MELAYU</b>', 'valign:M;align:C;rowspan:3;');
        $table->easyCell('MENDENGAR DAN BERTUTUR', 'valign:M;align:C');
        $table->easyCell($row['bm1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MEMBACA', 'valign:M;align:C');
        $table->easyCell($row['bm2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MENULIS', 'valign:M;align:C');
        $table->easyCell($row['bm3'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>BAHASA INGGERIS</b>', 'valign:M;align:C;rowspan:3;');
        $table->easyCell('LISTENING AND SPEAKING', 'valign:M;align:C');
        $table->easyCell($row['bi1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('READING', 'valign:M;align:C');
        $table->easyCell($row['bi2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('WRITING', 'valign:M;align:C');
        $table->easyCell($row['bi3'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>PENDIDIKAN ISLAM</b>', 'valign:M;align:C;rowspan:6;');
        $table->easyCell('AL-QURAN', 'valign:M;align:C');
        $table->easyCell($row['pi1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('AKIDAH', 'valign:M;align:C');
        $table->easyCell($row['pi2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('IBADAH', 'valign:M;align:C');
        $table->easyCell($row['pi3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('SIRAH', 'valign:M;align:C');
        $table->easyCell($row['pi4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('AKHLAK', 'valign:M;align:C');
        $table->easyCell($row['pi5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('JAWI', 'valign:M;align:C');
        $table->easyCell($row['pi6'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>KETERAMPILAN DIRI</b>', 'valign:M;align:C;rowspan:1;colspan:2');
        $table->easyCell($row['keterampilan'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>PERKEMBANGAN FIZIKAL DAN PENJAGAAN KESIHATAN</b>', 'valign:M;align:C;rowspan:6;colspan:1');
        $table->easyCell('PERKEMBANGAN MOTOR HALUS', 'valign:M;align:C');
        $table->easyCell($row['perkem1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PERKEMBANGAN MOTOR KASAR', 'valign:M;align:C');
        $table->easyCell($row['perkem2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MANIPULASI', 'valign:M;align:C');
        $table->easyCell($row['perkem3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PERGERAKAN IRAMA', 'valign:M;align:C');
        $table->easyCell($row['perkem4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PENDIDIKAN KESIHATAN REPRODUKTIF DAN SOSIAL (PEERS)', 'valign:M;align:C');
        $table->easyCell($row['perkem5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PEMAKANAN', 'valign:M;align:C');
        $table->easyCell($row['perkem6'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>KREATIVITI DAN ESTETIKA</b>', 'valign:M;align:C;rowspan:2;colspan:1');
        $table->easyCell('MUZIK', 'valign:M;align:C');
        $table->easyCell($row['kreativ1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('SENI VISUAL', 'valign:M;align:C');
        $table->easyCell($row['kreativ2'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>SAINS AWAL</b>', 'valign:M;align:C;rowspan:2;colspan:1');
        $table->easyCell('PROSES SAINS', 'valign:M;align:C');
        $table->easyCell($row['sainsawal1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PENEROKAAN', 'valign:M;align:C');
        $table->easyCell($row['sainsawal2'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>MATEMATIK AWAL</b>', 'valign:M;align:C;rowspan:6;colspan:1');
        $table->easyCell('PENGALAMAN PRANOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('KONSEP NOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('OPERASI NOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('NILAI WANG', 'valign:M;align:C');
        $table->easyCell($row['matematikawal4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MASA DAN WAKTU', 'valign:M;align:C');
        $table->easyCell($row['matematikawal5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('BENTUK DAN RUANG', 'valign:M;align:C');
        $table->easyCell($row['matematikawal6'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>KEMANUSIAAN</b>', 'valign:M;align:C;rowspan:1;colspan:2');
        $table->easyCell($row['kemanusiaan'], 'valign:M;align:C');
        $table->printRow();
        $table->endTable();


        $tablec = new easyTable($pdf, '%{100}', 'border:0;');

        $tablec->easyCell('Catatan', 'valign:B;   align:L;border:0;font-size:10;');
        $tablec->printRow();
        $tablec->easyCell($row['catatan'], 'valign:M;   align:C;border:1;font-size:12;');
        $tablec->printRow();
        $tablec->endTable();

        $tarikh2 = date("Y", strtotime($tarikh2));
        $pdf->Output('D', $tarikh2 . '-' . $icmurid . '-pemarkahan.pdf');
    }




}



if (isset($_POST['download-pdf-borang'])) {
    require('assets/vendor/fpdf/fpdf.php');
    require('assets/vendor/fpdi/src/autoload.php');

    require('assets/vendor/fpdf/exfpdf.php');
    require('assets/vendor/fpdf/easyTable.php');

    $id = $_POST['ic'];
    $query = "SELECT * FROM murid WHERE no_kad_pengenalan='$id' ";
    $result = mysqli_query($db, $query);



    // Instanciation of inherited class
    $pdf = new exFPDF('P', 'mm', 'A4');

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    // for($i=1;$i<=40;$i++)

    $nama =" ";
    $umur =" ";
    $ic =" ";
    $tarikh_mula =" ";
    $warganegara =" ";
    $bangsa =" ";
    $tarikh_lahir =" ";
    $no_sijil_lahir =" ";
    $tempat_lahir =" ";
    $jantina =" ";
    $alamat_rumah =" ";
    $saizbaju =" ";
    $penyakit =" ";
    $tinggi =" ";
    $berat =" ";
    $masalah_makanan =" ";
    $kecacatan =" ";
    $nama_penjaga =" ";
    $alamat_rumah_penjaga =" ";
    $telefon_penjaga =" ";
    $hubungan_penjaga =" ";

    $gambar =" ";
    $file_mykid =" ";
    $file_sijil =" ";
    $file_rekod_kesihatan =" ";
    $geran =" ";


    $tableb = new easyTable($pdf, '%{70,30}', 'border:0;font-size:8;');
    while ($row = mysqli_fetch_assoc($result)) {


        $nama = $row['name'];
        $umur = $row['age'];
        $ic = $row['no_kad_pengenalan'];
        $tarikh_mula = $row['tarikh_mula'];
        $warganegara = $row['warganegara'];
        $bangsa = $row['bangsa'];
        $tarikh_lahir = $row['tarikh_lahir'];
        $no_sijil_lahir = $row['no_sijil_lahir'];
        $tempat_lahir = $row['tempat_lahir'];
        $jantina = $row['jantina'];
        $alamat_rumah = $row['alamat_rumah'];
        $saizbaju = $row['saizbaju'];
        $penyakit = $row['penyakit'];
        $tinggi = $row['tinggi'];
        $berat = $row['berat'];
        $masalah_makanan = $row['masalah_makanan'];
        $kecacatan = $row['kecacatan'];
        $nama_penjaga = $row['nama_penjaga'];
        $alamat_rumah_penjaga = $row['alamat_rumah_penjaga'];
        $telefon_penjaga = $row['telefon_penjaga'];
        $hubungan_penjaga = $row['hubungan_penjaga'];

        $gambar = $row['gambar'];
        $file_mykid = $row['file_mykid'];
        $file_sijil = $row['file_sijil'];
        $file_rekod_kesihatan = $row['file_rekod_kesihatan'];
        $geran = $row['geran'];

    }

    $tableb->easyCell('', 'img:assets/img/kemaslogo.png,w40;valign:M;  align:C');
    $tableb->easyCell('PNDFT/KNK/TBK', 'valign:M;  align:C');
    $tableb->printRow();

    $tableb->easyCell("BORANG PENDAFTARAN\nKANAK-KANAK TABIKA KEMAS\nJABATAN KEMAJUAN MASYARAKAT\nKEMENTERIAN KEMAJUAN DESA DAN WILAYAH\nTAHUN 2024/2025", 'valign:M;  align:C');
    $tableb->easyCell('', 'img:assets/murid/' . $ic . "/" . $gambar . ',w40;valign:M;  align:C');
    $tableb->printRow();

    $tableb->endTable(10);

    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial', '', 8);

    $tablebahA = new easyTable($pdf, '%{33,33,34}', 'border:0;font-size:8;');

    $tablebahA->easyCell('<b>BAHAGIAN A : BUTIRAN DIRI KANAK-KANAK (Diisi oleh ibu/bapa atau penjaga)</b>', 'valign:L;  align:L;colspan:3');
    $tablebahA->printRow();
    $tablebahA->endTable();

    $tablebahA1 = new easyTable($pdf, '%{33,33,34}', 'border:0;font-size:8;');

    $tablebahA1->easyCell('Nama Kanak-Kanak : ' . $nama, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->easyCell('Warganegara : ' . $warganegara, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->printRow();

    $tablebahA1->easyCell('Bangsa/Keturunan : ' . $bangsa, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->easyCell('Tarikh Lahir : ' . $tarikh_lahir, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->easyCell('Umur : ' . $umur, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->printRow();

    $tablebahA1->easyCell('No. Sijil Lahir : ' . $no_sijil_lahir, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->easyCell('Tempat Lahir : ' . $tempat_lahir, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->easyCell('Jantina : ' . $jantina, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->printRow();

    $tablebahA1->easyCell('Alamat Rumah : ' . $alamat_rumah, 'valign:L;  align:L;colspan:2;paddingY:2');
    $tablebahA1->easyCell('Saiz Baju : ' . $saizbaju, 'valign:L;  align:L;paddingY:2');
    $tablebahA1->printRow();
    $tablebahA1->endTable(5);


    $tablebahA2 = new easyTable($pdf, '%{33,33,34}', 'border:0;font-size:8;');

    $tablebahA2->easyCell('<b>A Kesihatan Kanak-kanak</b>', 'valign:L;  align:L;colspan:3');
    $tablebahA2->printRow();

    $tablebahA2->easyCell('Jenis Penyakit yang dihidapi : ', 'valign:L;  align:L;paddingY:2');
    $tablebahA2->easyCell($penyakit, 'valign:L;  align:L;paddingY:2');
    $tablebahA2->printRow();

    $tablebahA2->easyCell('Fizikal Kanak-Kanak : ', 'valign:L;  align:L;paddingY:2;rowspan:2');
    $tablebahA2->easyCell('Tinggi : ' . $tinggi . 'cm', 'valign:L;  align:L;paddingY:2;colspan:2');
    $tablebahA2->printRow();

    // $tablebahA2->easyCell('');
    $tablebahA2->easyCell('Berat : ' . $berat . 'kg', 'valign:L;  align:L;paddingY:2;colspan:2');
    $tablebahA2->printRow();

    $tablebahA2->easyCell('Masalah makanan/alahan', 'valign:L;  align:L;paddingY:2');
    $tablebahA2->easyCell($masalah_makanan, 'valign:L;  align:L;paddingY:2');
    $tablebahA2->printRow();

    // $tablebahA2->easyCell('Kecacatan', 'valign:L;  align:L;paddingY:2');
    // $tablebahA2->easyCell($kecacatan, 'valign:L;  align:L;paddingY:2');
    // $tablebahA2->printRow();


    $tablebahA2->endTable(5);




    // $tablebahA3 = new easyTable($pdf, '%{5,33,33,29}', 'border:0;font-size:8;');
    // $tablebahA3->easyCell('<b>Orang yang boleh dihubungi jika berlaku kecemasan:</b>', 'valign:L;  align:L;colspan:3');
    // $tablebahA3->printRow();

    // $tablebahA3->easyCell('asd');
    // $tablebahA3->easyCell('Nama : ', 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->easyCell($nama_penjaga, 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->printRow();
    // $tablebahA3->easyCell('asd');

    // $tablebahA3->easyCell('Alamat : ', 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->easyCell($alamat_rumah_penjaga, 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->printRow();
    // $tablebahA3->easyCell('asd');

    // $tablebahA3->easyCell('No. Telefon : ', 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->easyCell($telefon_penjaga, 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->printRow();

    // $tablebahA3->easyCell('asd');
    // $tablebahA3->easyCell('Hubungan : ', 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->easyCell($hubungan_penjaga, 'valign:L;  align:L;paddingY:2');
    // $tablebahA3->printRow();

    // $tablebahA3->endTable(5);

    // $pdf->AddPage();


    // $tablebahB = new easyTable($pdf, '%{33,33,34}', 'border:0;font-size:8;');

    // $tablebahB->easyCell('<b>BAHAGIAN B : PENDAPATAN KELUARGA (Diisi oleh ibu/bapa atau penjaga)</b>', 'valign:L;  align:L;colspan:3');
    // $tablebahB->printRow();
    // $tablebahB->endTable();

    // $query2 = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic' ORDER BY id ASC ";
    // $result2 = mysqli_query($db, $query2);

    // $Rows = array();
    // $countrows = mysqli_num_rows($result2);
    // $ds = 0;
    // while ($row = mysqli_fetch_array($result2)) {
    //     $Rows[$ds] = $row;
    //     $ds++;
    // }

    // $tablebahB1 = new easyTable($pdf, '%{4,48,48}', 'border:1;font-size:8; ');
    // $tablebahB1->easyCell('Bil', 'bgcolor:#BFBFBF');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Maklumat : ' . $row1["hubungan"], 'valign:L;  align:L;colspan:1;bgcolor:#BFBFBF');

    // }

    // $tablebahB1->printRow(true);






    // $tablebahB1->easyCell('a', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Nama : ' . $row1['nama'], 'valign:L;  align:L;paddingY:2');

    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('b', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('No. K.P : ' . $row1["kad_pengenalan"], 'valign:L;  align:L;paddingY:2');

    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('c', 'valign:M;  align:C;paddingY:2;rowspan:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Tarikh Lahir : ' . $row1["tarikh_lahir"], 'valign:L;  align:L;paddingY:2;colspan:1');
    // }
    // if ($countrows != "2") {
    //     $tablebahB1->easyCell('', 'border:0');
    // }
    // $tablebahB1->printRow();


    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Tempat Lahir : ' . $row1["tempat_lahir"], 'valign:L;  align:L;paddingY:2;');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('d', 'valign:M;  align:C;paddingY:2');
    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Warganegara : ' . $row1["warganegara"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('e', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Keturunan : ' . $row1["keturunan"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('f', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Pekerjaan : ' . $row1["pekerjaan"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('g', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Status : ' . $row1["status"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('h', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Pendapatan Sebulan : RM ' . $row1["pendapatan_sebulan"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();


    // $tablebahB1->easyCell('h', 'valign:M;  align:C;paddingY:2');

    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('No. Telefon Pejabat : ' . $row1["no_telefon_pejabat"], 'valign:L;  align:L;paddingY:2');
    // }
    // $tablebahB1->printRow();


    // $tablebahB1->easyCell('j', 'valign:M;  align:C;paddingY:2;rowspan:2');
    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Nama Majikan : ' . $row1["nama_majikan"], 'valign:L;  align:L;paddingY:2;');
    // }

    // if ($countrows != "2") {
    //     $tablebahB1->easyCell('', 'border:0');
    // }
    // $tablebahB1->printRow();


    // foreach ($Rows as $row1) {
    //     $tablebahB1->easyCell('Alamat Majikan : ' . $row1["alamat_majikan"], 'valign:L;  align:L;paddingY:2;');
    // }
    // $tablebahB1->printRow();

    // $tablebahB1->endTable(5);

    // $query3 = "SELECT * FROM keluarga_tanggungan WHERE no_kad_pengenalan_murid='$ic' ORDER BY id ASC ";
    // $result3 = mysqli_query($db, $query3);

    // $tablebahB1 = new easyTable($pdf, '%{4,30,9,13,25,19}', 'border:1;font-size:8;');
    // $tablebahB1->easyCell('Bil', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->easyCell('Nama', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->easyCell('Umur', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->easyCell('Perhubungan', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->easyCell('Nama Institusi', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->easyCell('Nilai Biasiswa/ Bantuan Setahun', 'valign:M;  align:C;colspan:1;bgcolor:#BFBFBF');
    // $tablebahB1->printRow(true);
    // $i = 1;
    // while ($row3 = mysqli_fetch_array($result3)) {


    //     $tablebahB1->easyCell($i, 'valign:L;  align:C;paddingY:2');
    //     $tablebahB1->easyCell($row3["nama"], 'valign:M;  align:C;colspan:1');
    //     $tablebahB1->easyCell($row3["umur"], 'valign:M;  align:C;colspan:1');
    //     $tablebahB1->easyCell($row3["perhubungan"], 'valign:M;  align:C;colspan:1');
    //     $tablebahB1->easyCell($row3["nama_institusi"], 'valign:M;  align:C;colspan:1');
    //     $tablebahB1->easyCell("RM" . $row3["nilai_biasiswa"], 'valign:M;  align:C;colspan:1');
    //     $tablebahB1->printRow();
    //     $i += 1;
    // }

    // $tablebahB1->endTable(5);





    // $pdf->AddPage();

    // $pdf->setSourceFile("assets/murid/000723140251/bahagianc.pdf");
    // $tplId = $pdf->importPage(1);
    // // use the imported page and place it at point 10,10 with a width of 100 mm
    // $pdf->useTemplate($tplId, 0, 0);
    // $pdf->AddPage();
    // $tablebahB = new easyTable($pdf, '%{33,33,34}', 'border:0;font-size:8;');

    // $tablebahB->easyCell('<b>BAHAGIAN D : PERAKUAN IBU/BAPA/PENJAGA</b>', 'valign:L;  align:L;colspan:3');
    // $tablebahB->printRow();
    // $tablebahB->endTable();

    // $tablebahB1 = new easyTable($pdf, '%{4,96}', 'border:0;font-size:8;');
    // $tablebahB1->easyCell('');
    // $tablebahB1->easyCell('Sekiranya anak saya diterima:', 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('1');
    // if ($geran == "1") {
    //     $tablebahB1->easyCell('Saya memperakui bahawa saya <b>memenuhi syarat</b> kelayakan penerima bantuan Geran Perkapita', 'valign:L;  align:L;colspan:1');
    // } else {
    //     $tablebahB1->easyCell('Saya memperakui bahawa saya <b>tidak memenuhi syarat</b> kelayakan penerima bantuan Geran Perkapita', 'valign:L;  align:L;colspan:1');
    // }

    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('2');
    // $tablebahB1->easyCell('Saya akan membantu melibatkan diri secara aktif dalam pelaksanaan program dan aktiviti Tabika Kemas', 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('3');
    // $tablebahB1->easyCell("Saya menjamin anak saya akan hadir ke TABIKA KEMAS pada hari-hari yang ditetapkan.\nSekiranya anak saya TIDAK HADIR adalah menjadi tanggungjawab saya untuk memaklumkan kepada pihak TABIKA.\nKetidakhadiran akan disokong dengan dokumen sokongan.", 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('4');
    // $tablebahB1->easyCell('Saya membenarkan anak saya menerima rawatan perkhidmatan kesihatan/ disuntik/ tanam cacar (jika belum) dan lain-lain rawatan yang dirasakan perlu.', 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();


    // $tablebahB1->easyCell('5');
    // $tablebahB1->easyCell('Saya membenarkan anak saya dibawa melawat oleh guru bersama-sama dengan kanak-kanak lain semasa waktu belajar', 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();

    // $tablebahB1->easyCell('6');
    // $tablebahB1->easyCell('Sesuatu kemalangan yang berlaku kepada kanak-kanak diluar sesi persekolahan dan kawasan TABIKA adalah tanggungjawab ibu/bapa/penjaga', 'valign:L;  align:L;colspan:1');
    // $tablebahB1->printRow();

    // $tablebahB1->endTable();


    // $pdf->AddPage();
    // $pdf->setSourceFile("assets/murid/" . $ic . "/kesihatan.pdf");
    // $tplId = $pdf->importPage(1);
    // $pdf->useTemplate($tplId, 0, 0);


    // $pdf->AddPage();
    // $pdf->setSourceFile("assets/murid/" . $ic . "/mykid.pdf");
    // $tplId = $pdf->importPage(1);
    // $pdf->useTemplate($tplId, 0, 0);

    // $pdf->AddPage();
    // $pdf->setSourceFile("assets/murid/" . $ic . "/sijillahir.pdf");
    // $tplId = $pdf->importPage(1);
    // $pdf->useTemplate($tplId, 0, 0);

    // $pdf->AddPage();
    // $pdf->setSourceFile("assets/murid/" . $ic . "/slipgaji.pdf");
    // $tplId = $pdf->importPage(1);
    // $pdf->useTemplate($tplId, 0, 0);
    $pdf->Output();





}


if (isset($_POST['edit-profile'])) {

    $ic = $_POST['ic'];

    $alamat_rumah = $_POST['alamat_rumah'];
    $nama_penjaga = $_POST['nama_penjaga'];
    $alamat_rumah_penjaga = $_POST['alamat_rumah_penjaga'];
    $telefon_penjaga = $_POST['telefon_penjaga'];
    $hubungan_penjaga = $_POST['hubungan_penjaga'];


    $query = "UPDATE murid SET 
    alamat_rumah='$alamat_rumah', 
    nama_penjaga='$nama_penjaga', 
    alamat_rumah_penjaga='$alamat_rumah_penjaga', 
    telefon_penjaga='$telefon_penjaga',
    hubungan_penjaga='$hubungan_penjaga'  
    WHERE no_kad_pengenalan='$ic' ";
    $result = mysqli_query($db, $query);
    debug_to_console($result);
}


if (isset($_POST['tambahmesyuarat'])) {

    foreach ($_POST as $key => $value) {
        debug_to_console($key . " : " . $value);
    }
    $user = $_SESSION['username'];

    $nama = $_POST['nama'];
    $maklumat = $_POST['maklumat'];
    $tarikh_mula = $_POST['date1'];
    $tarikh_akhir = $_POST['date2'];
    $status = 0;

    $query = "INSERT INTO meeting (nama,created_by,maklumat,tarikh_mula,tarikh_akhir,status) 
                VALUES ('$nama','$user','$maklumat','$tarikh_mula','$tarikh_akhir','$status')";
    $result = mysqli_query($db, $query);
    header('location: mesyuarat.php');
    exit();
}

if (isset($_POST['meetingdetail'])) {
    $_SESSION['meetingid'] = $_POST['meetingid'];
    header('location: mesyuarat-maklumat.php');
}
if (isset($_POST['qrcodescan'])) {

    foreach ($_POST as $key => $value) {
        debug_to_console($key . " : " . $value);
    }
    $idmurid = $_POST['idmurid'];
    $qrcode = $_POST['qrcodescan'];

    // $qrcode2 = str_replace("kemas_mesyuarat://"," ",$qrcode);

    $qrcode2 = substr($qrcode, 18);

    $query = "INSERT INTO meeting_kehadiran (id_murid,nama_meeting) 
    VALUES ('$idmurid','$qrcode2')";
    $result = mysqli_query($db, $query);
}



?>