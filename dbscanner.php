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
            if ($isViewRow[0] == 'VIEW') {
                $isView = true;
            } else {
                $isView = false;
            }
            $obj = array(
                'tableName' => $tb_name,
                'isView' => $isView
            );
            $status = $this->tables->addTable($obj, $tb_name);
        }

        return $status;
    }

    public function tables()
    {
        return $this->tables;
    }
}
