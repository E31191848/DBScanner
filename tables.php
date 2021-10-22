<?php

include_once('../DBScanner/table.php');

class myTables
{
    private $table;

    function __construct()
    {
        $this->table = new myTable();
    }

    public function addTable($obj, $key = null)
    {
        if ($key == null) {
            $this->table->setTableName = $obj['tableName'];
            $this->table->setIsView = $obj['isView'];
            return true;
        } else {
            $check = $this->table->getTableName($key);
            if (isset($check)) {
                return "Tabel $key sudah ada.";
            } else {
                $this->table->tableSet($obj['tableName'], $obj['isView'] ? 'true' : 'false', $key);
                // $this->table->setTableName($obj['tableName'], $key);
                // $this->table->setIsView($obj['isView'] ? 'true' : 'false', $key);
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
            echo "Tabel $key tidak ada.";
        }
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

    public function deleteTable($key)
    {
        $check = $this->table->getTableName($key);
        if (isset($check)) {
            $this->table->tableDelete($key);
            // $this->table->deleteTableName($key);
            // $this->table->deleteIsView($key);

            return true;
        } else {
            echo "Invalid key $key.";
        }
    }

    public function count()
    {
        return count($this->showAllTable());
    }
}
