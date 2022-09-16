<?php

/**
 * GI-Common-DVLP - WebTerminosServicio
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\Components
 *
 * @version 0B.00
 * @since 18-02-25
 */

namespace GIndie\INIHandler;

/**
 * DVLP-GICommon - WebTerminosServicio
 * 
 * @link <http://www.huffingtonpost.com.mx/p/huffpost-mexico-terminos>
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\INIHandler
 *
 * @edit 18-02-25
 * - Class extends \GIndie\INIHandler
 * - Abstract class
 * - Created requiredVars(), getVigor(), getIntro(), getTerminos()
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @edit 18-08-04
 * - Upgraded DocBlock and versions
 */
abstract class WebTerminosServicio extends \GIndie\INIHandler
{

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function requiredVars()
    {
        return [
            "TerminosServicio" => ["Vigor", "Intro", "1"]
        ];
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getVigor()
    {
        return static::getCategoryValue("TerminosServicio", "Vigor");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getIntro()
    {
        return static::getCategoryValue("TerminosServicio", "Intro");
    }

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function getTerminos()
    {
        $counter = 1;
        $skip = false;
        $rntArray = [];
        while ($skip == false) {
            $tmp = static::getCategoryValue("TerminosServicio", (string) $counter);
            $counter++;
            switch (true)
            {
                case \is_null($tmp):
                    $skip = true;
                    break;
                default:
                    $rntArray[(string) $counter] = $tmp;
                    break;
            }
        }
        return $rntArray;
    }

}
