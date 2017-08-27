<?php
/**
 * Created by PhpStorm.
 * User: Axel
 * Date: 27/08/17
 * Time: 12:40
 */

class Utilities
{
    static function first($table)
    {
        foreach($table as $value)
        {
            return $value;
        }
    }

}