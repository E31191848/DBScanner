<?php

include_once('./table.php');
include_once('fields.php');

class myTables
{
    private $table;
    private $fields;
    private $arrTable = [];

    function __construct()
    {
        $this->table = new myTable();
        $this->fields = new myFields();
    }

    public function addTable($obj)
    {
        $key = $obj['tableName'];
        if (isset($this->arrTable[$key])) {
            echo "Tabel $key sudah ada.";
        } else {
            $this->arrTable[$key] = array(
                'tableName' => $obj['tableName'],
                'isView' => $obj['isView'] ? 'true' : 'false'
            );
            return true;
        }
    }

    public function getTable($key)
    {
        $check = $this->arrTable[$key];
        if (isset($check)) {
            $this->table()->tableSet(
                $this->arrTable[$key]['tableName'],
                $this->arrTable[$key]['isView']
            );
            // return $this->arrTable[$key];
            return $this;
        } else {
            echo "Tabel '$key' tidak ada.";
        }
    }

    public function getAllTable()
    {
        $string = '';
        foreach ($this->arrTable as $row) {
            $tableName = $row['tableName'];
            $isView = $row['isView'];

            $string .= "tableName : $tableName <br> ->isView : $isView<br><br>";
        }
        return $string;
        // return $this->arrTable;
    }

    public function deleteTable($key)
    {
        $check = $this->arrTable[$key];
        if (isset($check)) {
            unset($this->arrTable[$key]);
        } else {
            echo "Tabel '$key' tidak ada.";
        }
    }

    public function count()
    {
        return count($this->arrTable);
    }

    public function table()
    {
        return $this->table;
    }

    public function fields()
    {
        return $this->fields;
    }
}
