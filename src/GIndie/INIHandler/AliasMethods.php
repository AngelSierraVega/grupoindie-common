<?php

/**
 * GICommon - AliasMethods
 */

namespace GIndie\INIHandler;

/**
 * Description of AliasMethods
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-01-05 Trait created.
 * @edit GI-CMMN.00.01
 * - Created getValue()
 */
trait AliasMethods
{
    /**
     * Alias for getCategoryValue().
     * 
     * @since GI-CMMN.00.01
     * 
     * @param string $category The category of the variable.
     * @param string $varname The name of the variable.
     * 
     * @return mixed
     */
    public static function getValue($category, $varname)
    {
        isset(self::$ini_data[static::fileName()]) ?: static::readINI();
        return self::$ini_data[static::fileName()][$category][$varname];
    }
}
