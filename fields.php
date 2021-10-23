<?php

include_once('field.php');

class myFields
{
    private $field;

    function __construct()
    {
        $this->field = new myField();
    }

    public function addField($obj)
    {
        !empty($obj['fieldName']) ? $key = $obj['fieldName'] : $key = null;
        if ($key == null) {
            $this->field->fieldSet(
                'tanpa_nama',
                $obj['dataType'],
                $obj['dataLength'],
                $obj['isPK'] ? 'true' : 'false',
                $obj['isNull'] ? 'true' : 'false',
                'tanpa_nama'
            );
            return true;
        } else {
            $check = $this->field->getFieldName($key);
            if (isset($check)) {
                return "Field $key sudah ada.";
            } else {
                $this->field->fieldSet(
                    $obj['fieldName'],
                    $obj['dataType'],
                    $obj['dataLength'],
                    $obj['isPK'] ? 'true' : 'false',
                    $obj['isNull'] ? 'true' : 'false',
                    $key
                );
                return true;
            }
        }
    }

    public function getField($key)
    {
        $check = $this->field->getFieldName($key);
        if (isset($check)) {
            $arr = array(
                'fieldName' => $this->field->getFieldName($key),
                'dataType' => $this->field->getDataType($key),
                'dataLength' => $this->field->getDataLength($key),
                'isPK' => $this->field->getIsPK($key),
                'isNull' => $this->field->getIsNull($key)
            );
            return $arr;
        } else {
            echo "Field '$key' tidak ada.";
        }
    }

    public function deleteField($key)
    {
        $check = $this->field->getFieldName($key);
        if (isset($check)) {
            $this->field->fieldDelete($key);
            return true;
        } elseif ($this->getField('tanpa_nama') && empty($check)) {
            $this->field->fieldDelete('tanpa_nama');
            return true;
        } else {
            echo "Field '$key' tidak ada.";
        }
    }

    public function count()
    {
        return count($this->showAllField());
    }

    public function showAllField()
    {
        foreach ($this->field->getAllFieldName() as $row) {
            $arr[] = array(
                'fieldName' => $row,
                'dataType' => $this->field->getDataType($row),
                'dataLength' => $this->field->getDataLength($row),
                'isPK' => $this->field->getIsPK($row),
                'isNull' => $this->field->getIsNull($row)
            );
        }
        return $arr;
    }
}
