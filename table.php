<?php

include_once('fields.php');

final class myTable
{
    // private $fields;
    private $tableName, $isView;

    function __construct()
    {
        $this->fields = new myFields();
    }

    // tableName
    public function getTableName()
    {
        return $this->tableName;
    }

    public function setTableName($value)
    {
        $this->tableName = $value;
    }

    // isView
    public function getIsView()
    {
        return $this->isView;
    }

    public function setIsView($value)
    {
        $this->isView = $value;
    }

    // show table
    public function show()
    {
        return "
        <table>
            <tr>
                <th>No</th>
                <th>tableName</th>
                <th>isView</th>
            </tr>
            <tr>
                <td>1</td>
                <td>$this->tableName</td>
                <td>$this->isView</td>
            </tr>
        </table>
        ";
    }

    public function fields()
    {
        return $this->fields;
    }
}
