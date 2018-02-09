<?php

/**
 * DVLP-GICommon - Currency
 */

namespace GIndie\Common\Parser;

/**
 * Description of Currency
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 18-02-06 Empty class created.
 * @edit GI-CMMN.00.01
 * - Created format(), formatFull()
 */
class Currency
{

    /**
     * @since GI-CMMN.00.01
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        return \bcadd(\strval($value), 0, 2);
    }
    
    /**
     * @since GI-CMMN.00.01
     * @param mixed $value
     * @return string
     */
    public static function formatFull($value)
    {
        return "$&nbsp;". static::format($value);
    }

}
