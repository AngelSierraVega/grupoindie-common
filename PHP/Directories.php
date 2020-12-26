<?php

/**
 * GI-Common-DVLP - Directories
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
 *
 * @version 0B.00
 * @since 18-02-24
 */

namespace GIndie\Common\PHP;

/**
 * @edit 18-02-24
 * - Created createFolderStructure()
 * @edit 18-08-04
 * - Upgraded DocBlock
 * @todo
 * - Move class to Handler/
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
     * @since 18-02-24
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
