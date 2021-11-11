<?php

final class myField
{
    private $fieldName, $dataType, $dataLength, $isPK, $isNull;

    public function fieldSet($fieldName, $dataType, $dataLength, $isPK, $isNull)
    {
        $this->fieldName = $fieldName;
        $this->dataType = $dataType;
        $this->dataLength = $dataLength;
        $this->isPK = $isPK;
        $this->isNull = $isNull;
    }

    // fieldName
    public function getFieldName()
    {
        return $this->fieldName;
    }

    public function setFieldName($value)
    {
        $this->fieldName = $value;
    }

    // dataType
    public function getDataType()
    {
        return $this->dataType;
    }

    public function setDataType($value)
    {
        $this->dataType = $value;
    }

    // dataLength
    public function getDataLength()
    {
        return $this->dataLength;
    }

    public function setDataLength($value)
    {
        $this->dataLength = $value;
    }

    // isPK
    public function getIsPK()
    {
        return $this->isPK;
    }

    public function setIsPK($value)
    {
        $this->isPK = $value;
    }

    // isNull
    public function getIsNull()
    {
        return $this->isNull;
    }

    public function setIsNull($value)
    {
        $this->isNull = $value;
    }

    // show field
    public function show()
    {
        return "
        <table>
            <tr>
                <th>No</th>
                <th>fieldName</th>
                <th>dataType</th>
                <th>dataLength</th>
                <th>isPK</th>
                <th>isNull</th>
            </tr>
            <tr>
                <td>1</td>
                <td>$this->fieldName</td>
                <td>$this->dataType</td>
                <td>$this->dataLength</td>
                <td>$this->isPK</td>
                <td>$this->isNull</td>
            </tr>
        </table>
        ";
    }
}
