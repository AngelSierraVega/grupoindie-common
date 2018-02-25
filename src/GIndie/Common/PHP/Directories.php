<?php

namespace GIndie\Common\PHP;

/**
 * DVLP-GICommon - Directories
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-02-24 Empty class created.
 * @edit GI-CMMN.00.01
 * - Created createFolderStructure()
 */
class Directories
{

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
