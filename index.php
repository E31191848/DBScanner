<?php

include_once('dbscanner.php');

$db = new DBScanner();

$db->scanMySQL('localhost', 'root', '', 'db_kapron_petshop');

echo '<pre>';
print_r($db->tables()->showAllTable());
echo '<pre>';

echo 'Total Tabel : ' . $db->tables()->count();

$tableName = 'tb_mantap';
$isview = false;
$obj = array (
    'tableName' => $tableName,
    'isView' => $isview
);

$db->tables()->addTable($obj, $tableName);
echo '<pre>';
print_r($db->tables()->showAllTable());
echo '<pre>';

echo 'Total Tabel : ' . $db->tables()->count();

$db->tables()->deleteTable($tableName);
echo '<pre>';
print_r($db->tables()->showAllTable());
echo '<pre>';

echo 'Total Tabel : ' . $db->tables()->count();

echo'<br><br>';
print_r($db->tables()->getTable('report_penjualan_harian'));