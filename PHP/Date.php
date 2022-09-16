<?php

/**
 * GI-Common-DVLP - Date
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\PHP
 *
 * @version 0C.00
 * @since 18-09-18
 */

namespace GIndie\Common\PHP;

/**
 * Description of Date
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 */
class Date
{
    
    /**
     * 
     * @param int $timestamp
     * @return string
     * @since 18-09-18
     */
    public static function reducedDateFromTimestamp($timestamp)
    {
        return \date("y-m-d", $timestamp);
    }

    /**
     * 
     * @param int $timestamp
     * @return string
     * @since 18-09-18
     */
    public static function fullDateFromTimestamp($timestamp)
    {
        return \date("Y-m-d", $timestamp);
    }
    
    /**
     * 
     * @param int $timestamp
     * @return string
     * @since 18-12-24
     */
    public static function fullDateTimeFromTimestamp($timestamp)
    {
        return \date("Y-m-d H:i:s", $timestamp);
    }

}
