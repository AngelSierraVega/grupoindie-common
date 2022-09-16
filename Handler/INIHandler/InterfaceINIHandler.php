<?php

/**
 * GI-Common-DVLP - InterfaceINIHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\INIHandler
 *
 * @version 0B.00
 * @since 17-12-23
 */

namespace GIndie\INIHandler;

/**
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @edit 17-12-23
 * - pathToFile() added
 * @edit 17-12-23
 * - Added comment on pathToFile()
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @edit 18-08-04
 * - Upgraded DocBlock and versions
 */
interface InterfaceINIHandler
{

    /**
     * 
     * @since 17-12-23
     * @return string
     */
    public static function fileName();

    /**
     * 
     * @since 17-12-23
     * @return array
     */
    public static function requiredVars();

    /**
     * 
     * For standard class use: return __DIR__ . "\\" . static::fileName() . ".ini";
     * For phar use: return \dirname(\Phar::running(false)) . "/" . static::fileName() . ".ini";
     * 
     * @since 17-12-23
     * @return string
     */
    public static function pathToFile();
}
