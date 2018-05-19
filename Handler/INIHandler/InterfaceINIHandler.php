<?php

/**
 * GICommon - InterfaceINIHandler
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 */

namespace GIndie\INIHandler;

/**
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * 
 * @since 17-12-23
 * @version GI-CMMN.00.01
 * @edit GI-CMMN.00.02
 * - pathToFile() added
 * @edit GI-CMMN.00.03
 * - Added comment on pathToFile()
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
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
