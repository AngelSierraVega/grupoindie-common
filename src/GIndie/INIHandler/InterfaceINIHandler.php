<?php

/**
 * GICommon - InterfaceINIHandler 2017-12-23
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie\INIHandler;

/**
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI-CMMN.00.01
 * @edit GI-CMMN.00.02
 * - pathToFile() added
 * @edit GI-CMMN.00.03
 * - Added comment on pathToFile()
 */
interface InterfaceINIHandler
{

    /**
     * 
     * @since GI-CMMN.00.01
     * @return string
     */
    public static function fileName();

    /**
     * 
     * @since GI-CMMN.00.01
     * @return array
     */
    public static function requiredVars();

    /**
     * 
     * For standard class use: return __DIR__ . "\\" . static::fileName() . ".ini";
     * For phar use: return \dirname(\Phar::running(false)) . "/" . static::fileName() . ".ini";
     * 
     * @since GI-CMMN.00.02
     * @return string
     */
    public static function pathToFile();
}
