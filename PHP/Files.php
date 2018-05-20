<?php

/**
 * GI-Common-DVLP - Files
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
 *
 * @since 18-05-19
 * @version 0A.55
 */

namespace GIndie\Common\PHP;

/**
 * Handles file behaviour in PHP
 * @version 0A.55
 */
class Files
{

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
    public static function getRecursiveIteratorIterator($directoryPath,
                                                        array $exclude = [],
                                                        $flag = \RecursiveDirectoryIterator::SKIP_DOTS)
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
