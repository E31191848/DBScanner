<?php

class myField
{
    private $fieldName, $dataType, $dataLength;
    private $isPK, $isNull = FALSE;

    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function setFieldName($value)
    {
        $this->fieldName = $value;
    }

    public function getDataType()
    {
        return $this->dataType;
    }

    public function setDataType($value)
    {
        $this->dataType = $value;
    }

    public function getDataLength()
    {
        return $this->dataLength;
    }

    public function setDataLength($value)
    {
        $this->dataLength = $value;
    }

    public function getIsPK()
    {
        return $this->isPK;
    }

    public function setIsPK($value)
    {
        $this->isPK = $value;
    }

    public function getIsNull()
    {
        return $this->isNull;
    }

    public function setIsNull($value)
    {
        $this->isNull = $value;
    }
}