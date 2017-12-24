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
     * @since GI-CMMN.00.02
     * @return string
     */
    public static function pathToFile();
}
