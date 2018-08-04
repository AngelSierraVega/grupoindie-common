<?php

/**
 * DVLP-GICommon - CommonProjectHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\Components
 *
 * @version 0B.00
 * @since 18-02-24
 */

namespace GIndie\Common;

/**
 * @edit 18-02-24
 * - Class extends ProjectHandler
 * - Implemented abstrac methods
 * - Created autoloaderFilename()
 * @edit 18-02-27 
 * - Remove autoloaderFilename()
 * - Renamed file from CommonProjectHandler.php to ProjectHandler.php
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
class ProjectHandler extends \GIndie\ProjectHandler
{

    /**
     * 
     * @return string
     * @since 18-05-18
     * @edit 18-08-04
     * - Added BetaOne: Unit test
     */
    public static function versions()
    {
        $rtnArray = parent::versions();
        //AlphaFive
        $rtnArray[\hexdec("0A.50")]["description"] = "Upgraded DocBlock and file version";
        $rtnArray[\hexdec("0A.50")]["code"] = "AlphaFive";
        $rtnArray[\hexdec("0A.50")]["threshold"] = "0A.50";
        
        $rtnArray[\hexdec("0B.70")]["description"] = "Unit test";
        $rtnArray[\hexdec("0B.70")]["code"] = "BetaOne";
        $rtnArray[\hexdec("0B.70")]["threshold"] = "0B.70";
        
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
