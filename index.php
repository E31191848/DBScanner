<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Scanner</title>
    <style>
        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }

        body {
            margin: 30px;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px 10px 4px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php

    include_once('dbscanner.php');

    $db = new DBScanner();

    // scan db
    $db->scanMySQL('localhost', 'root', '', 'db_kapron_petshop');

    /* ---------------------TABLE--------------------- */
    echo "<h1 style='text-align: center;'>TABLE</h1>";

    // get specific table
    echo "<h2>get specific table</h2>";
    echo $db->tables()->getTable('report_penjualan_harian')->show() . '<br>';
    echo "getIsView : " . $db->tables()->getTable('report_penjualan_harian')->getIsView() . '<br>';
    echo "<br><br><hr><br>";

    // show all table
    echo "<h2>show all table</h2>";
    print_r($db->tables()->getAllTable()) . '<br>';

    echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
    echo "<br><hr><br>";

    // add table
    echo "<h2>add table</h2>";
    $tableName = 'vw_sip';
    $isview = true;

    $db->tables()->addTable($tableName, $isview);
    print_r($db->tables()->getAllTable()) . '<br>';

    echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
    echo "<br><hr><br>";

    // delete table
    echo "<h2>delete table</h2>";
    $db->tables()->deleteTable($tableName);
    print_r($db->tables()->getAllTable()) . '<br>';

    echo '<h3>Total Tabel : ' . $db->tables()->count() . '</h3><br>';
    echo "<br><hr><br>";


    /* ---------------------FIELD--------------------- */
    // select table
    $table = 'tb_order';
    $tb = $db->tables()->getTable($table);

    echo "<h1 style='text-align: center;'>FIELD OF TABLE $table</h1>";

    // get specific field
    echo "<h2>get specific field of table $table</h2>";
    echo $tb->fields()->getField('order_bayar')->show() . '<br>';
    echo "getDataType : " . $tb->fields()->getField('order_bayar')->getDataType();
    echo "<br><br><br><hr><br>";

    // show all field
    echo "<h2>show all field of table $table</h2>";
    echo ($tb->fields()->getAllField());
    echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';
    echo "<br><hr><br>";

    // add field
    echo "<h2>add field in table $table</h2>";
    $fieldName = 'port';
    $dataType = 'int';
    $dataLength = '11';
    $isPK = true;
    $isNull = false;

    $tb->fields()->addField($fieldName, $dataType, $dataLength, $isPK, $isNull);
    print_r($tb->fields()->getAllField()) . '<br>';
    echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';
    echo "<br><hr><br>";

    // delete field
    echo "<h2>delete field from table $table</h2>";
    $tb->fields()->deleteField($fieldName);
    print_r($tb->fields()->getAllField()) . '<br>';
    echo "<h3>Total field pada tabel $table : " . $tb->fields()->count() . '</h3><br>';

    /* ---------------------SHOW OBJECT--------------------- */
    // echo "<pre>";
    // print_r($db->tables()->getTable('tb_order'))
    ?>

</body>

</html>