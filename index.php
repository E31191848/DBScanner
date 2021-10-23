<?php

include_once('dbscanner.php');

$db = new DBScanner();

// scan db
$db->scanMySQL('localhost', 'root', '', 'db_kapron_petshop');

echo '<pre>';


/* ---------------------TABLE--------------------- */
echo "<h1 style='text-align: center;'>TABLE</h1>";

// show all table
echo "<h2>show all table</h2>";
print_r($db->tables()->showAllTable()) . '<br>';

echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
echo "<br><hr><br>";

// add table
echo "<h2>add table</h2>";
$tableName = 'tb_mantap';
$isview = false;
$obj = array(
    'tableName' => $tableName,
    'isView' => $isview
);

$db->tables()->addTable($obj);
print_r($db->tables()->showAllTable()) . '<br>';

echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
echo "<br><hr><br>";

// delete table
echo "<h2>delete table</h2>";
$db->tables()->deleteTable($tableName);
print_r($db->tables()->showAllTable()) . '<br>';

echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
echo "<br><hr><br>";

// get specific table
echo "<h2>get specific table</h2>";
print_r($db->tables()->getTable('report_penjualan_harian')) . '<br>';
echo "<br><hr><br>";


/* ---------------------FIELD--------------------- */
echo "<h1 style='text-align: center;'>FIELD</h1>";

// select table
$table = 'tb_customer';
$tb = $db->tables()->selectTable($table);

// show all field
echo "<h2>show all field</h2>";
print_r($tb->fields()->showAllField()) . '<br>';
echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';
echo "<br><hr><br>";

// add field
echo "<h2>add field</h2>";
$fieldName = 'port';
$dataType = 'int';
$dataLength = '11';
$isPK = true;
$isNull = false;
$obj = array(
    'fieldName' => $fieldName,
    'dataType' => $dataType,
    'dataLength' => $dataLength,
    'isPK' => $isPK,
    'isNull' => $isNull
);

$tb->fields()->addField($obj);
print_r($tb->fields()->showAllField()) . '<br>';
echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';
echo "<br><hr><br>";

// get specific field
echo "<h2>get specific field</h2>";
print_r($tb->fields()->getField($fieldName));
echo "<br><hr><br>";

// delete field
echo "<h2>delete field</h2>";
$tb->fields()->deleteField($fieldName);
print_r($tb->fields()->showAllField()) . '<br>';
echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';
echo "<br><hr><br>";

echo '<pre>';
