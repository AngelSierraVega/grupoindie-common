<?php

namespace GIndie\INIHandler;

/**
 * DVLP-GICommon - WebTerminosServicio
 * 
 * @link <http://www.huffingtonpost.com.mx/p/huffpost-mexico-terminos>
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 *
 * @version GI-CMMN.00.00 18-02-25 Empty class created.
 * @edit GI-CMMN.00.01
 * - Class extends \GIndie\INIHandler
 * - Abstract class
 * - Created requiredVars(), getVigor(), getIntro(), getTerminos()
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
 */
abstract class WebTerminosServicio extends \GIndie\INIHandler
{

    /**
     * 
     * @return array
     * @since GI-CMMN.00.01
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
     * @since GI-CMMN.00.01
     */
    public static function getVigor()
    {
        return static::getCategoryValue("TerminosServicio", "Vigor");
    }

    /**
     * 
     * @return string
     * @since GI-CMMN.00.01
     */
    public static function getIntro()
    {
        return static::getCategoryValue("TerminosServicio", "Intro");
    }

    /**
     * 
     * @return array
     * @since GI-CMMN.00.01
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
