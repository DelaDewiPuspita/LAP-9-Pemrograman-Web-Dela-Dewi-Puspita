<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$koneksi = mysqli_connect('localhost', 'root', '', 'sekolah');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
$query = mysqli_query($koneksi, 'SELECT * FROM siswa');
// Export to Excel
if (isset($_POST['export'])) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    // Judul kolom
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Jenis Kelamin');
    $sheet->setCellValue('D1', 'Tanggal Lahir');
    $sheet->setCellValue('E1', 'Alamat');
    $sheet->setCellValue('F1', 'No Telepon');
    $rowNumber = 2;
    while ($row = mysqli_fetch_assoc($query)) {
        $sheet->setCellValue('A' . $rowNumber, $row['id_siswa']);
        $sheet->setCellValue('B' . $rowNumber, $row['nama']);
        $sheet->setCellValue('C' . $rowNumber, $row['jenis_kelamin']);
        $sheet->setCellValue('D' . $rowNumber, $row['tanggal_lahir']);
        $sheet->setCellValue('E' . $rowNumber, $row['alamat']);
        $sheet->setCellValue('F' . $rowNumber, $row['no_telepon']);
        $rowNumber++;
    }
    // Menyimpan file Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save('Data Siswa.xlsx');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Data Excel Sekolah</title>
</head>
<body>
    <h1>Report Data Excel Sekolah</h1>
    <form method="post">
        <input type="submit" name="export" value="Export to Excel">
    </form>
</body>
</html>
