<?php

namespace GIndie;

/**
 * DVLP-GICommon - ProjectHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-02-23 Empty class created.
 * @edit GI-CMMN.00.01
 * - Abstract class
 * - Implemented ProjectHandlerInterface
 * @edit GI-CMMN.00.02 18-02-24
 * - Updated autoloaderFilename()
 */
abstract class ProjectHandler implements ProjectHandler\ProjectHandlerInterface
{

    /**
     * @return array
     * @since GI-CMMN.00.01
     */
    public static function mainClasses()
    {
        return [];
    }

    /**
     * @return string
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    public static function autoloaderFilename()
    {
        return "Autoloader" . static::projectName() . ".php";
    }

    /**
     * 
     * @return string
     * @since GI-CMMN.00.02
     */
    public static function getNamespace()
    {
        $rntStr = "\\" . static::projectVendor();
        $rntStr .= static::projectNamespace() ? "\\" . static::projectNamespace() : "";
        $rntStr .= "\\" . static::projectName();
        return $rntStr;
    }

    /**
     * @return array
     * @since 18-03-27
     */
    public static function excludeFromPhar()
    {
        return [".git", ".gitignore", "nbproject"];
    }

}
