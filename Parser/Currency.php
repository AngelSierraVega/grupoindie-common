<?php

/**
 * GI-Common-DVLP - Currency
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\Parser
 *
 * @version 0B.00
 * @since 18-02-06
 */

namespace GIndie\Common\Parser;

/**
 * @edit 18-02-06
 * - Created format(), formatFull()
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
class Currency
{

    /**
     * @since 18-02-06
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        return \bcadd(\strval($value), 0, 2);
    }

    /**
     * @since 18-02-06
     * @param mixed $value
     * @return string
     */
    public static function formatFull($value)
    {
        return "$&nbsp;" . static::format($value);
    }

}
