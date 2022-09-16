<?php

/**
 * GI-Common-DVLP - Files
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\PHP
 *
 * @since 18-05-19
 * @version 0B.00
 */

namespace GIndie\Common\PHP;

/**
 * Handles file behaviour in PHP
 * @edit 18-08-02
 * - Created createFileIfNotExists()
 */
class Files
{

    /**
     * 
     * @param string $fullPathToFile
     * @return bool <b>TRUE</b> if the file or directory specified by
     * <i>filename</i> exists; <b>FALSE</b> otherwise.
     * @since 18-08-02
     */
    public static function createFileIfNotExists($fullPathToFile)
    {
        if (!\file_exists($fullPathToFile)) {
            $myfile = \fopen($fullPathToFile, 'wb') or die("Unable to open file!");
            \fwrite($myfile, \pack("CCC", 0xef, 0xbb, 0xbf));
            \fwrite($myfile, \utf8_encode("# AG: " . \date("c")));
            \fclose($myfile);
        }
        return \file_exists($fullPathToFile);
    }

    /**
     * 
     * @param string $directoryPath
     * @param array $exclude
     * @param boolean $skipDots
     * @return \SplFileInfo[]
     */
//    public static function getSplFileInfoFromDirectory($directoryPath,
//                                                       array $exclude = [],
//                                                       $skipDots = true)
//    {
//        $rtnArray = [];
//        foreach (static::getRecursiveIteratorIterator($directoryPath, $exclude) as $key => $value) {
//            $rtnArray[] = $value;
//        }
//        return $rtnArray;
//        $tmpArray =  \array_merge( );
//        return \array_values($tmpArray);
//    }

    /**
     * 
     * @param string $directoryPath
     * @param array $exclude
     * @param int $flag
     * @return \RecursiveIteratorIterator
     */
    public static function getRecursiveIteratorIterator($directoryPath, array $exclude = [], $flag = \RecursiveDirectoryIterator::SKIP_DOTS)
    {
        $filter = function ($file, $key, $iterator) use ($exclude) {
            if (\in_array($file->getFilename(), $exclude)) {
                return false;
            }
            return true;
        };
        $innerIterator = new \RecursiveDirectoryIterator(
                $directoryPath, $flag
        );
        $iterator = new \RecursiveIteratorIterator(
                new \RecursiveCallbackFilterIterator($innerIterator, $filter)
        );
        return $iterator;
    }

}
