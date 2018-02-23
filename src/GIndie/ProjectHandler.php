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
     */
    public static function autoloaderFile()
    {
        return static::pathToSourceCode() . "Autoloader" . static::projectName() . ".php";
    }

}
