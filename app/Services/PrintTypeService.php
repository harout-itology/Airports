<?php


namespace App\Services;
use App\Lib\PrintType\PrintTypeInterface;


class PrintTypeService
{
    public function callPrint(PrintTypeInterface $type, $value)
    {
        return $type->print($value);
    }

}
