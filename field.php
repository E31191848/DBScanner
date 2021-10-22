<?php

class myField
{
    private $fieldName, $dataType, $dataLength = [];
    private $isPK, $isNull = [];

    public function fieldSet($fieldName, $dataType, $dataLength, $isPK, $isNull, $key)
    {
        $this->fieldName[$key] = $fieldName;
        $this->dataType[$key] = $dataType;
        $this->dataLength[$key] = $dataLength;
        $this->isPK[$key] = $isPK;
        $this->isNull[$key] = $isNull;
    }
    
    public function fieldDelete($key)
    {
        unset($this->fieldName[$key]);
        unset($this->dataType[$key]);
        unset($this->dataLength[$key]);
        unset($this->isPK[$key]);
        unset($this->isNull[$key]);
    }

    // fieldName
    public function getFieldName($value)
    {
        if (!empty($this->fieldName[$value])) return $this->fieldName[$value];
    }

    public function getAllFieldName()
    {
        if (!empty($this->fieldName)) return $this->fieldName;
    }

    public function setFieldName($value, $key)
    {
        $this->fieldName[$key] = $value;
    }

    public function deleteFieldName($key)
    {
        unset($this->fieldName[$key]);
    }

    // dataType
    public function getDataType($value)
    {
        if (!empty($this->dataType[$value])) return $this->dataType[$value];
    }

    public function getAllDataType()
    {
        if (!empty($this->dataType)) return $this->dataType;
    }

    public function setDataType($value, $key)
    {
        $this->dataType[$key] = $value;
    }

    public function deleteDataType($key)
    {
        unset($this->dataType[$key]);
    }

    // dataLength
    public function getDataLength($value)
    {
        if (!empty($this->dataLength[$value])) return $this->dataLength[$value];
    }

    public function getAllDataLength()
    {
        if (!empty($this->dataLength)) return $this->dataLength;
    }

    public function setDataLength($value, $key)
    {
        $this->dataLength[$key] = $value;
    }

    public function deleteDataLength($key)
    {
        unset($this->dataLength[$key]);
    }

    // isPK
    public function getIsPK($value)
    {
        if (!empty($this->isPK[$value])) return $this->isPK[$value];
    }

    public function getAllIsPK()
    {
        if (!empty($this->isPK)) return $this->isPK;
    }

    public function setIsPK($value, $key)
    {
        $this->isPK[$key] = $value;
    }

    public function deleteIsPK($key)
    {
        unset($this->isPK[$key]);
    }

    // isNull
    public function getIsNull($value)
    {
        if (!empty($this->isNull[$value])) return $this->isNull[$value];
    }

    public function getAllIsNull()
    {
        if (!empty($this->isNull)) return $this->isNull;
    }

    public function setIsNull($value, $key)
    {
        $this->isNull[$key] = $value;
    }

    public function deleteIsNull($key)
    {
        unset($this->isNull[$key]);
    }
}
