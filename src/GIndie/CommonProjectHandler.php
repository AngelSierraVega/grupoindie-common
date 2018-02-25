<?php

namespace GIndie;

/**
 * DVLP-GICommon - CommonProjectHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-02-24 Empty class created.
 * @edit GI-CMMN.00.01
 * - Class extends ProjectHandler
 * - Implemented abstrac methods
 * - Created autoloaderFilename()
 * @todo 
 * - Remove autoloaderFilename()
 */
class CommonProjectHandler extends ProjectHandler
{
    /**
     * 
     * @return string
     * @since GI-CMMN.00.01
     */
    public static function autoloaderFilename()
    {
        return "autoloader.php";
    }

    /**
     * 
     * @return string
     * @since GI-CMMN.00.01
     */
    public static function pathToSourceCode()
    {
        return \pathinfo(__FILE__, \PATHINFO_DIRNAME) . \DIRECTORY_SEPARATOR;
    }

    /**
     * 
     * @return string
     *  @since GI-CMMN.00.01
     */
    public static function projectName()
    {
        return "Common";
    }

    /**
     * 
     * @return null
     *  @since GI-CMMN.00.01
     */
    public static function projectNamespace()
    {
        return null;
    }

    /**
     * 
     * @return string
     *  @since GI-CMMN.00.01
     */
    public static function projectVendor()
    {
        return "GIndie";
    }

}
