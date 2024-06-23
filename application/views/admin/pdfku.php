<?php
// Include autoloader Composer
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

// Buat instance Dompdf
$dompdf = new Dompdf();

// Contoh halaman HTML yang akan dicetak
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Halaman HTML untuk Konversi ke PDF</title>
</head>
<body>
    <h1>Halaman Contoh</h1>
    <p>Ini adalah contoh halaman HTML yang akan dikonversi menjadi PDF menggunakan dompdf.</p>
</body>
</html>
';

// Muat HTML ke Dompdf
$dompdf->loadHtml($html);

// Atur ukuran kertas dan orientasi (opsional)
$dompdf->setPaper('A4', 'portrait');

// Render PDF (penting untuk memanggil ini sebelum mengeluarkan konten PDF)
$dompdf->render();

// Outputkan PDF yang dihasilkan ke Browser
$dompdf->stream('hasil_konversi.pdf', array('Attachment' => false));
