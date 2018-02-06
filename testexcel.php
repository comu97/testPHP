<?php 

$dir = "PhpOffice/";
$dh  = opendir($dir);
$dir_list = array($dir);
while (false !== ($filename = readdir($dh))) {
	if($filename!="."&&$filename!=".."&&is_dir($dir.$filename))
		array_push($dir_list, $dir.$filename."/");
}
foreach ($dir_list as $dir) {
	foreach (glob($dir."*.php") as $filename)
		require_once $filename;
}
//require_once __DIR__.'/PhpSpreadsheet/Spreadsheet.php';
//require_once __DIR__.'/PhpSpreadsheet/Writer/Xlsx'

//use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$writer->save('helloworld.xlsx');

?>