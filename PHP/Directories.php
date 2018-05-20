<?php

namespace GIndie\Common\PHP;

/**
 * DVLP-GICommon - Directories
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
 *
 * @version GI-CMMN.00.00 18-02-24 Empty class created.
 * @edit GI-CMMN.00.01
 * - Created createFolderStructure()
 * @todo 
 * - Move class to Handler/
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
 */
class Directories
{

    /**
     * 
     * @since 18-03-15
     * @param string $filePath
     * @param int $levels
     * @return string
     */
    public static function getDirectoryFromFile($filePath, $levels = 0)
    {
        $rtnPath = \pathinfo($filePath, \PATHINFO_DIRNAME);
        for ($index = 0; $index < $levels; $index++) {
            $rtnPath = \dirname($rtnPath);
        }
        return $rtnPath;
    }

    /**
     * 
     * @return boolean
     * @since GI-CMMN.00.01
     */
    public static function createFolderStructure($baseDirectory, $folderStructure)
    {
        switch (true)
        {
            case (\substr($folderStructure, 0, 1) !== "\\"):
                throw \GIndie\Exception::fileCustom($baseDirectory . $folderStructure . " is not valid.");
            case (\file_exists($baseDirectory) == false):
                throw \GIndie\Exception::fileNotFound($baseDirectory);
            case (\file_exists($baseDirectory . $folderStructure) == false):
                $rntBool = \mkdir($baseDirectory . $folderStructure, 0777, $recursive = true);
                break;
            case \file_exists($baseDirectory . $folderStructure):
                $rntBool = true;
                break;
            default:
                throw \GIndie\Exception::fileCustom($baseDirectory . $folderStructure . " could not be created.");
        }
        return $rntBool;
    }

}
