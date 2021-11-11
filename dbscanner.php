<?php

include_once('tables.php');

class DBScanner
{
    private $tables;

    function __construct()
    {
        $this->tables = new myTables();
    }

    public function scanMySQL($host, $usrname, $pass, $db)
    {
        $koneksi = mysqli_connect($host, $usrname, $pass, $db);

        if (!$koneksi) {
            die("Gagal terhubung dengan database: " . mysqli_connect_error());
        } else {
            if (!$this->addAllTable($koneksi, $db)) {
                die("Gagal sync table!");
            }
            return $koneksi;
        }
    }

    // menambahkan semua table dari database ke array / collection
    public function addAllTable($con, $db)
    {
        $result = $con->query('SHOW TABLES;');

        while ($row = mysqli_fetch_array($result)) {
            $tb_name = $row[0];
            $isViewRow = mysqli_fetch_row(
                $con->query("SELECT TABLE_TYPE 
                                FROM information_schema.tables 
                                WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$tb_name'")
            );
            $isViewRow[0] == 'VIEW' ? $isView = true : $isView = false;

            $status = $this->tables->addTable($tb_name, $isView);

            // setiap perulangan add field data ke array / collection berdasarkan nama tabel
            if ($status) $this->addAllField($con, $db, $tb_name);
        }

        return $status;
    }

    // menambahkan semua field dari database ke array / collection
    public function addAllField($con, $db, $table)
    {
        $check = $this->tables->getTable($table);
        if (isset($check)) {
            $result = $con->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$table'");

            while ($row = mysqli_fetch_assoc($result)) {
                $fieldName = $row['COLUMN_NAME'];
                $dataType = $row['DATA_TYPE'];
                $dataLength = !empty($row['CHARACTER_MAXIMUM_LENGTH']) ? $row['CHARACTER_MAXIMUM_LENGTH'] : $row['NUMERIC_PRECISION'];
                !empty($dataLength) ? $dataLength : $dataLength = $row['DATETIME_PRECISION'];
                $isPK = $row['COLUMN_KEY'] == 'PRI' ? true : false;
                $isNull = $row['IS_NULLABLE'] == 'YES' ? true : false;
                $this->tables->getTable($table)->fields()->addField($fieldName, $dataType, $dataLength, $isPK, $isNull);
            }

            return $this;
        } else {
            exit("Tabel '$table' tidak ada.");
        }
    }

    public function tables()
    {
        return $this->tables;
    }
}
