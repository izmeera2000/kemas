
<?php


require('assets/vendor/fpdf/fpdf.php');

require('assets/vendor/fpdf/exfpdf.php');
require('assets/vendor/fpdf/easyTable.php');

class exPDF extends FPDF
{


    // Page header


    // Page footer




}
$nama = "HEYHEYasdasdasdHEY";

// Instanciation of inherited class
$pdf = new exFPDF('P', 'mm', 'A4');

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

$tablea->easyCell('Nama', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();
$tablea->easyCell('No. MyKid', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();

$tablea->easyCell('Jantina', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();
$tablea->easyCell('Umur', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();
// $tablea->easyCell('Kelas', 'valign:M; bgcolor:#d9d8d4;  align:L');
// $tablea->easyCell('Nama', 'valign:M;, 255;align:L');
// $tablea->printRow();
$tablea->easyCell('Nama Guru', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();
$tablea->easyCell('Tarikh Pelaporan', 'valign:M; bgcolor:#d9d8d4;  align:L');
$tablea->easyCell('Nama', 'valign:M;, 255;align:L');
$tablea->printRow();
$tablea->endTable(10);




$table = new easyTable($pdf, '%{20, 20, 60}', 'border:1;font-size:12;');

$table->easyCell('<b>Komponen</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
$table->easyCell('<b>Kemahiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
$table->easyCell('<b>Tafsiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
$table->printRow(true);

$table->easyCell('<b>BAHASA MELAYU</b>', 'valign:M;align:C;rowspan:3;');
$table->easyCell('MENDENGAR DAN BERTUTUR', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('MEMBACA', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('MENULIS', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();

$table->easyCell('<b>BAHASA INGGERIS</b>', 'valign:M;align:C;rowspan:3;');
$table->easyCell('LISTENING AND SPEAKING', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('READING', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('WRITING', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();


$table->easyCell('<b>PENDIDIKAN ISLAM</b>', 'valign:M;align:C;rowspan:6;');
$table->easyCell('AL-QURAN', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('AKIDAH', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('IBADAH', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('SIRAH', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('AKHLAK', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('JAWI', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();

$table->easyCell('<b>KETERAMPILAN DIRI</b>', 'valign:M;align:C;rowspan:1;colspan:2');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();

$table->easyCell('<b>PERKEMBANGAN FIZIKAL DAN PENJAGAAN KESIHATAN</b>', 'valign:M;align:C;rowspan:6;colspan:1');
$table->easyCell('PERKEMBANGAN MOTOR HALUS', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('PERKEMBANGAN MOTOR KASAR', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('MANIPULASI', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('PERGERAKAN IRAMA', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('PENDIDIKAN KESIHATAN REPRODUKTIF DAN SOSIAL (PEERS)', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('PEMAKANAN', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();

$table->easyCell('<b>KREATIVITI DAN ESTETIKA</b>', 'valign:M;align:C;rowspan:2;colspan:1');
$table->easyCell('MUZIK', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('SENI VISUAL', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();


$table->easyCell('<b>SAINS AWAL</b>', 'valign:M;align:C;rowspan:2;colspan:1');
$table->easyCell('PROSES SAINS', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('PENEROKAAN', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();

$table->easyCell('<b>MATEMATIK AWAL</b>', 'valign:M;align:C;rowspan:6;colspan:1');
$table->easyCell('PENGALAMAN PRANOMBOR', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('KONSEP NOMBOR', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('OPERASI NOMBOR', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('NILAI WANG', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('MASA DAN WAKTU', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->easyCell('BENTUK DAN RUANG', 'valign:M;align:C');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();


$table->easyCell('<b>KEMANUSIAAN</b>', 'valign:M;align:C;rowspan:1;colspan:2');
$table->easyCell('Bahasa Melayu', 'valign:M;align:C');
$table->printRow();
$table->endTable();


$tablec = new easyTable($pdf, '%{100}', 'border:0;');

$tablec->easyCell('Catatan', 'valign:B;   align:L;border:0;font-size:10;');
$tablec->printRow();
$tablec->easyCell('Nama', 'valign:M;   align:C;border:1;font-size:12;');
$tablec->printRow();
$tablec->endTable();

$pdf->Output();
?>