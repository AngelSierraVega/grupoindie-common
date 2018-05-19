<?php

namespace GIndie\INIHandler;

/**
 * Description of AliasMethods
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 *
 * @since 18-01-05
 * @edit 18-01-05
 * - Created getValue()
 * @version 0A.10
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @version 0A.50
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
