<?php

include_once('fields.php');

class myTable
{
    private $fields;
    private $tableName, $isView;

    function __construct()
    {
        $this->fields = new myFields();
    }

    public function tableSet($tableName, $isView){
        $this->tableName = $tableName;
        $this->isView = $isView;
    }

    // tableName
    public function getTableName()
    {
        if (!empty($this->tableName)) return $this->tableName;
    }

    public function setTableName($value)
    {
        $this->tableName = $value;
    }

    // isView
    public function getIsView()
    {
        if (!empty($this->isView)) return $this->isView;
    }

    public function setIsView($value)
    {
        $this->isView = $value;
    }

    // show table
    public function show()
    {
        return array(
            'tableName' => $this->tableName,
            'isView' => $this->isView
        );
    }

    public function fields()
    {
        return $this->fields;
    }
}
