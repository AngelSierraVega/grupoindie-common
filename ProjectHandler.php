<?php

namespace GIndie\Common;

/**
 * DVLP-GICommon - CommonProjectHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 *
 * @since 18-02-24
 * @version UNDEFINED
 * @edit 18-02-24
 * - Class extends ProjectHandler
 * - Implemented abstrac methods
 * - Created autoloaderFilename()
 * @edit 18-02-27 
 * - Remove autoloaderFilename()
 * - Renamed file from CommonProjectHandler.php to ProjectHandler.php
 * @version 0A.10
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @version 0A.50
 */
class ProjectHandler extends \GIndie\ProjectHandler
{

    /**
     * 
     * @return string
     * @since 18-05-18
     */
    public static function versions()
    {
        $rtnArray = parent::versions();
        //AlphaFive
        $rtnArray[\hexdec("0A.50")]["description"] = "Upgraded DocBlock and file version";
        $rtnArray[\hexdec("0A.50")]["code"] = "AlphaFive";
        $rtnArray[\hexdec("0A.50")]["threshold"] = "0A.50";
        \ksort($rtnArray);
        return $rtnArray;
    }

    /**
     * 
     * @return string
     * @since 18-02-24
     */
    public static function autoloaderFilenameDPR()
    {
        return "autoloader.php";
    }

    /**
     * 
     * @return string
     * @since 18-02-24
     */
    public static function pathToSourceCode()
    {
        return \pathinfo(__FILE__, \PATHINFO_DIRNAME) . \DIRECTORY_SEPARATOR;
    }

    /**
     * 
     * @return string
     *  @since 18-02-24
     */
    public static function projectName()
    {
        return "Common";
    }

    /**
     * 
     * @return null
     *  @since 18-02-24
     */
    public static function projectNamespace()
    {
        return null;
    }

    /**
     * 
     * @return string
     *  @since 18-02-24
     */
    public static function projectVendor()
    {
        return "GIndie";
    }

}
