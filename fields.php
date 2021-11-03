<?php

include_once('field.php');

class myFields
{
    private $field;
    private $arrField = [];

    function __construct()
    {
        $this->field = new myField();
    }

    public function addField($obj)
    {
        $key = $obj['fieldName'];
        if (isset($this->arrField[$key])) {
            return "Field $key sudah ada.";
        } else {
            $this->arrField[$key] = array(
                'fieldName' => $obj['fieldName'],
                'dataType' => $obj['dataType'],
                'dataLength' => $obj['dataLength'],
                'isPK' => $obj['isPK'] ? 'true' : 'false',
                'isNull' => $obj['isNull'] ? 'true' : 'false'
            );
            return true;
        }
    }

    public function getField($key)
    {
        $check = $this->arrField[$key];
        if (isset($check)) {
            $this->field()->fieldSet(
                $this->arrField[$key]['fieldName'], 
                $this->arrField[$key]['dataType'], 
                $this->arrField[$key]['dataLength'], 
                $this->arrField[$key]['isPK'], 
                $this->arrField[$key]['isNull']
            );
            return $this->field;
        } else {
            echo "Field '$key' tidak ada.";
        }
    }

    public function getAllField()
    {
        $string = '';
        foreach ($this->arrField as $row) {
            $fieldName = $row['fieldName'];
            $dataType = $row['dataType'];
            $dataLength = $row['dataLength'];
            $isPK = $row['isPK'];
            $isNull = $row['isNull'];

            $string .= "fieldName : $fieldName <br> ->dataType : $dataType <br> ->dataLength : $dataLength <br> ->isPK : $isPK <br> ->isNull : $isNull<br><br>";
        }
        return $string;
        // return $this->arrField;
    }

    public function deleteField($key)
    {
        $check = $this->arrField[$key];
        if (isset($check)) {
            unset($this->arrField[$key]);
        } else {
            echo "Field '$key' tidak ada.";
        }
    }

    public function count()
    {
        return count($this->arrField);
    }

    public function field()
    {
        return $this->field;
    }
}
