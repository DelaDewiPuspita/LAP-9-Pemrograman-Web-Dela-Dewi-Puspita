<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet(); // Perbaikan pada penulisan nama kelas
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !'); // Perbaikan pada penulisan variabel $Sheet menjadi $sheet (huruf kecil)

$writer = new Xlsx($spreadsheet);
$writer->save('hello_world.xlsx'); // Perbaikan pada penulisan nama file
?>