<?php

include_once('field.php');

final class myFields
{
    private $field;
    private $listField = [];

    function __construct()
    {
        $this->field = new myField();
    }

    public function addField($fieldName, $dataType, $dataLength, $isPK, $isNull)
    {
        for ($x = 0; $x < sizeof($this->listField); $x++) {
            if ($this->listField[$x]->getFieldName() == $fieldName) {
                exit("Field '$fieldName' sudah ada.");
            }
        }

        $field = new myField();
        $field->setFieldName($fieldName);
        $field->setDataType($dataType);
        $field->setDataLength($dataLength);
        $field->setIsPK($isPK ? 'true' : 'false');
        $field->setIsNull($isNull ? 'true' : 'false');

        $this->listField[] = $field;
        return $this;
    }

    public function getField($key)
    {
        if (filter_var($key, FILTER_VALIDATE_INT) === false) {
            // get by field name
            for ($x = 0; $x < sizeof($this->listField); $x++) {
                if ($this->listField[$x]->getFieldName() == $key) {
                    return $this->listField[$x];
                }
            }
            exit("Field '$key' tidak ada.");
        } else {
            // get by index
            if (isset($this->listField[$key])) {
                return $this->listField[$key];
            } else {
                exit("Index '$key' tidak ada.");
            }
        }
    }

    public function getAllField()
    {
        $string = "
        <table>
            <tr>
                <th>fieldName</th>
                <th>dataType</th>
                <th>dataLength</th>
                <th>isPK</th>
                <th>isNull</th>
            </tr>
        ";
        foreach ($this->listField as $field) {
            $fieldName = $field->getFieldName();
            $dataType = $field->getDataType();
            $dataLength = $field->getDataLength();
            $isPK = $field->getIsPK();
            $isNull = $field->getIsNull();

            $string .= "
            <tr>
                <td>$fieldName</td>
                <td>$dataType</td>
                <td>$dataLength</td>
                <td>$isPK</td>
                <td>$isNull</td>
            </tr>
            ";
        }
        $string .= "</table>";
        return $string;
    }

    public function deleteField($key)
    {
        if (filter_var($key, FILTER_VALIDATE_INT) === false) {
            // get by field name
            for ($x = 0; $x < sizeof($this->listField); $x++) {
                if ($this->listField[$x]->getFieldName() == $key) {
                    unset($this->listField[$x]);
                    return $this;
                }
            }
            exit("Field '$key' tidak ada.");
        } else {
            // get by index
            if (isset($this->listField[$key])) {
                unset($this->listField[$key]);
                return $this;
            } else {
                exit("Index '$key' tidak ada.");
            }
        }
    }

    public function count()
    {
        return count($this->listField);
    }

    public function field()
    {
        return $this->field;
    }
}
