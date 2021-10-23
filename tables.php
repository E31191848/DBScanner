<?php

include_once('../DBScanner/table.php');
include_once('fields.php');

class myTables
{
    private $table;
    private $fields;
    private $db = [];

    function __construct()
    {
        $this->table = new myTable();
        $this->fields = new myFields();
    }

    public function addTable($obj)
    {
        !empty($obj['tableName']) ? $key = $obj['tableName'] : $key = null;
        if ($key == null) {
            $this->table->tableSet(
                'tanpa_nama',
                $obj['isView'] ? 'true' : 'false',
                'tanpa_nama'
            );
            return true;
        } else {
            $check = $this->table->getTableName($key);
            if (isset($check)) {
                return "Tabel $key sudah ada.";
            } else {
                $this->table->tableSet(
                    $obj['tableName'],
                    $obj['isView'] ? 'true' : 'false',
                    $key
                );
                return true;
            }
        }
    }

    public function getTable($key)
    {
        $check = $this->table->getTableName($key);
        if (isset($check)) {
            $arr = array(
                'tableName' => $this->table->getTableName($key),
                'isView' => $this->table->getIsView($key)
            );
            return $arr;
        } else {
            echo "Tabel '$key' tidak ada.";
        }
    }

    public function deleteTable($key)
    {
        $check = $this->table->getTableName($key);
        if (isset($check)) {
            $this->table->tableDelete($key);
            return true;
        } elseif ($this->getTable('tanpa_nama') && empty($check)) {
            $this->table->tableDelete('tanpa_nama');
            return true;
        } else {
            echo "Tabel '$key' tidak ada.";
        }
    }

    public function count()
    {
        return count($this->showAllTable());
    }

    public function showAllTable()
    {
        foreach ($this->table->getAllTableName() as $row) {
            $arr[] = array(
                'tableName' => $row,
                'isView' => $this->table->getIsView($row)
            );
        }
        return $arr;
    }

    public function fields()
    {
        return $this->fields;
    }

    public function selectTable($table)
    {
        $check = $this->table->getTableName($table);
        if (isset($check)) {
            $con = $this->db['koneksi'];
            $db = $this->db['dbname'];

            $result = $con->query("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$db' AND TABLE_NAME = '$table'");

            while ($row = mysqli_fetch_assoc($result)) {
                $fieldName = $row['COLUMN_NAME'];
                $dataType = $row['DATA_TYPE'];
                $dataLength = !empty($row['CHARACTER_MAXIMUM_LENGTH']) ? $row['CHARACTER_MAXIMUM_LENGTH'] : $row['NUMERIC_PRECISION'];
                $isPK = $row['COLUMN_KEY'] == 'PRI' ? true : false;
                $isNull = $row['IS_NULLABLE'] == 'YES' ? true : false;
                $obj = array(
                    'fieldName' => $fieldName,
                    'dataType' => $dataType,
                    'dataLength' => $dataLength,
                    'isPK' => $isPK,
                    'isNull' => $isNull
                );
                $this->fields->addField($obj);
            }

            return $this;
        } else {
            exit("Tabel '$table' tidak ada.");
        }
    }

    public function setDB($obj)
    {
        $this->db = $obj;
    }
}
