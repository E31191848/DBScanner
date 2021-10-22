<?php

class myTable
{
    private $tableName = [];
    private $isView = [];

    // tableName
    public function getTableName($value)
    {
        if(!empty($this->tableName[$value])) return $this->tableName[$value];
    }

    public function getAllTableName()
    {
        if(!empty($this->tableName)) return $this->tableName;
    }

    public function setTableName($value, $key)
    {
        $this->tableName[$key] = $value;
    }

    public function deleteTableName($key)
    {
        unset($this->tableName[$key]);
    }

    // isView
    public function getIsView($value)
    {
        if(!empty($this->isView[$value])) return $this->isView[$value];
    }

    public function getAllIsView()
    {
        if(!empty($this->isView)) return $this->isView;
    }

    public function setIsView($value, $key)
    {
        $this->isView[$key] = $value;
    }

    public function deleteIsView($key)
    {
        unset($this->isView[$key]);
    }

}