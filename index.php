<?php

include_once('dbscanner.php');

$db = new DBScanner();

// scan db
$db->scanMySQL('localhost', 'root', '', 'db_kapron_petshop');

// show all table
echo '<pre>';
print_r($db->tables()->showAllTable());
echo '<pre>';

// count all table
echo 'Total Tabel : ' . $db->tables()->count();

// add table
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

// count all table
echo 'Total Tabel : ' . $db->tables()->count();

$db->tables()->deleteTable($tableName);
echo '<pre>';
print_r($db->tables()->showAllTable());
echo '<pre>';

// count all table
echo 'Total Tabel : ' . $db->tables()->count();

echo'<br><br>';
// get specific table
print_r($db->tables()->getTable('report_penjualan_harian'));