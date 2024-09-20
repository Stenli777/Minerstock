<?php

namespace App\FormFields;

use TCG\Voyager\FormFields\AbstractHandler;

class MultipleSelectJSON extends AbstractHandler
{
    protected $codename = 'multiple_select_json'; // Уникальный идентификатор вашего поля
    protected $name = "Multiple Select Json";

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.multiple_select_json', [
            'row'             => $row,
            'options'         => $options,
            'dataTypeContent' => $dataTypeContent,
            'dataType'        => $dataType,
        ]);
    }
}
