<?php

/**
 * GICommon - MyINIHandler 2017-12-26
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00
 */

/**
 * Description of MyINIHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 */
class MyINIHandler extends \GIndie\INIHandler
{

    //put your code here
    public static function fileName()
    {
        return "MyINI";
    }

    public static function pathToFile()
    {
        return __DIR__ . "\\" . static::fileName() . ".ini";
    }

    public static function requiredVars()
    {
        return ["MyINI" => ["test1"], "section1" => ["test1", "test2"], "section2" => ["test1"]];
    }

}
