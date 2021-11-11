<?php

include_once('./table.php');

final class myTables
{
    private $table;
    private $listTable = [];

    function __construct()
    {
        $this->table = new myTable();
    }

    public function addTable($tableName, $isView)
    {
        for ($x = 0; $x < sizeof($this->listTable); $x++) {
            if ($this->listTable[$x]->getTableName() == $tableName) {
                exit("Tabel '$tableName' sudah ada.");
            }
        }

        $table = new myTable();
        $table->setTableName($tableName);
        $table->setIsView($isView ? 'true' : 'false');

        $this->listTable[] = $table;
        return $this;
    }

    public function getTable($key)
    {
        if (filter_var($key, FILTER_VALIDATE_INT) === false) {
            // get by table name
            for ($x = 0; $x < sizeof($this->listTable); $x++) {
                if ($this->listTable[$x]->getTableName() == $key) {
                    return $this->listTable[$x];
                }
            }
            exit("Tabel '$key' tidak ada.");
        } else {
            // get by index
            if (isset($this->listTable[$key])) {
                return $this->listTable[$key];
            } else {
                exit("Index '$key' tidak ada.");
            }
        }
    }

    public function getAllTable()
    {
        $string = "
        <table>
            <tr>
                <th>No</th>
                <th>tableName</th>
                <th>isView</th>
            </tr>
        ";
        $no = 1;
        foreach ($this->listTable as $table) {
            $tableName = $table->getTableName();
            $isView = $table->getIsView();

            $string .= "
            <tr>
                <td>" . $no++ . "</td>
                <td>$tableName</td>
                <td>$isView</td>
            </tr>
            ";
        }
        $string .= "</table>";
        return $string;
    }

    public function deleteTable($key)
    {
        if (filter_var($key, FILTER_VALIDATE_INT) === false) {
            // get by table name
            for ($x = 0; $x < sizeof($this->listTable); $x++) {
                if ($this->listTable[$x]->getTableName() == $key) {
                    unset($this->listTable[$x]);
                    return $this;
                }
            }
            exit("Tabel '$key' tidak ada.");
        } else {
            // get by index
            if (isset($this->listTable[$key])) {
                unset($this->listTable[$key]);
                return $this;
            } else {
                exit("Index '$key' tidak ada.");
            }
        }
    }

    public function count()
    {
        return count($this->listTable);
    }

    public function table()
    {
        return $this->table;
    }
}
