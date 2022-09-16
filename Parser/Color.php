<?php

/**
 * GI-Common-DVLP - Color
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\Parser
 *
 * @version 0B.80
 * @since 19-04-13
 */

namespace GIndie\Common\Parser;

/**
 * Description of Color
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 */
class Color
{

    /**
     * Returns an array with the rgb values.
     * 
     * @link <https://bavotasan.com/2011/convert-hex-color-to-rgb-using-php/>
     * 
     * @param string $hex
     * @return array
     */
    public static function hex2rgb($hex)
    {
        $hex = \str_replace("#", "", $hex);
        if (\strlen($hex) == 3) {
            $r = \hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = \hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = \hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = \hexdec(substr($hex, 0, 2));
            $g = \hexdec(substr($hex, 2, 2));
            $b = \hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        return $rgb;
    }

}
