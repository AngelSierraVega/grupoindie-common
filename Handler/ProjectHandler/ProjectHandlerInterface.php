<?php

namespace GIndie\ProjectHandler;

/**
 * DVLP-GICommon - ProjectHandlerInterface
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-02-23 Empty interface created.
 * @edit GI-CMMN.00.01
 * - Added methods from UnitTest\GIndie\UnitTest\Handler\InterfaceProject
 * @edit GI-CMMN.00.02 18-02-24
 * - Updated autoloaderFilename()
 */
interface ProjectHandlerInterface
{

    /**
     * @return array
     * @since GI-CMMN.00.01
     */
    public static function mainClasses();

    /**
     * 
     * @since GI-CMMN.00.01
     */
    public static function projectName();

    /**
     * 
     * @since GI-CMMN.00.01
     */
    public static function projectNamespace();

    /**
     * 
     * @since GI-CMMN.00.01
     */
    public static function projectVendor();

    /**
     * 
     * @since GI-CMMN.00.01
     */
    public static function pathToSourceCode();

    /**
     * 
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    public static function autoloaderFilename();

    /**
     * @return array
     * @since 18-03-27
     */
    public static function excludeFromPhar();
}
