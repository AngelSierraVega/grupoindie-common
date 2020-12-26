<?php

/**
 * GI-Common-DVLP - Exception
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\INIHandler
 *
 * @version 0B.00
 * @since 18-01-05
 */

namespace GIndie\INIHandler;

/**
 * Description of AliasMethods
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\INIHandler
 *
 * @edit 18-01-05
 * - Created getValue()
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @edit 18-08-04
 * - Upgraded DocBlock and versions
 */
trait AliasMethods
{

    /**
     * Alias for getCategoryValue().
     * 
     * @since 18-01-05
     * 
     * @param string $category The category of the variable.
     * @param string $varname The name of the variable.
     * 
     * @return mixed
     */
    public static function getValue($category, $varname)
    {
        return static::getCategoryValue($category, $varname);
    }

}
