<?php

class myField
{
    private $fieldName, $dataType, $dataLength, $isPK, $isNull;

    public function fieldSet($fieldName, $dataType, $dataLength, $isPK, $isNull){
        $this->fieldName = $fieldName;
        $this->dataType = $dataType;
        $this->dataLength = $dataLength;
        $this->isPK = $isPK;
        $this->isNull = $isNull;
    }

    // fieldName
    public function getFieldName()
    {
        if (!empty($this->fieldName)) return $this->fieldName;
    }

    public function setFieldName($value)
    {
        $this->fieldName = $value;
    }

    // dataType
    public function getDataType()
    {
        if (!empty($this->dataType)) return $this->dataType;
    }

    public function setDataType($value)
    {
        $this->dataType = $value;
    }

    // dataLength
    public function getDataLength()
    {
        if (!empty($this->dataLength)) return $this->dataLength;
    }

    public function setDataLength($value)
    {
        $this->dataLength = $value;
    }

    // isPK
    public function getIsPK()
    {
        if (!empty($this->isPK)) return $this->isPK;
    }

    public function setIsPK($value)
    {
        $this->isPK = $value;
    }

    // isNull
    public function getIsNull()
    {
        if (!empty($this->isNull)) return $this->isNull;
    }

    public function setIsNull($value)
    {
        $this->isNull = $value;
    }

    // show field
    public function show()
    {
        return array(
            'fieldName' => $this->fieldName,
            'dataType' => $this->dataType,
            'dataLength' => $this->dataLength,
            'isPK' => $this->isPK,
            'isNull' => $this->isNull
        );
    }
}
