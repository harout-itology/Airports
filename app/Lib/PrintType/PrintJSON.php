<?php


namespace App\Lib\PrintType;


class PrintJSON implements PrintTypeInterface
{
    public function print($value)
    {
        return json_decode($value, true);
    }

}
