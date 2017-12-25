<?php

/**
 * GICommon - DocComment 2017-12-24
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie\Common\Parser;

/**
 * Description of DocComment
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI-CMMN.00.00 2017-12-24
 * @edit GI-CMMN.00.01
 *  - Added main functions
 */
class DocComment
{

    /**
     *
     * @var type 
     * @since GI-CMMN.00.01
     */
    private static $tags = ["param", "return", "since", "edit", "version", "author"];

    /**
     * 
     * @param type $tagname
     * @param type $value
     * @return type
     * @since GI-CMMN.00.01
     */
    private static function parseTag($tagname, $value)
    {
        switch ($tagname)
        {
            case "param":
                return [$value];
                break;
            default:
                return ["content" => $value];
                break;
        }
    }

    /**
     * 
     * @param array $parse
     * @return array
     * @since GI-CMMN.00.01
     */
    private static function formatParse02(array $parse)
    {
        $newArray = [];
        foreach ($parse as $value) {
            $value = \trim($value);
            if (\strcmp($value, "") != 0) {
                switch (\substr($value, 0, 1))
                {
                    case "@":
                        $newArray[] = $value;
                        break;
                    default:
                        $newArray[] = \array_pop($newArray) . " " . $value;
                        break;
                }
            }
        }
        \var_dump($newArray);
        return $newArray;
    }

    /**
     * 
     * @param string $string
     * @return array
     * @since GI-CMMN.00.01
     */
    private static function formatParse01($string)
    {
        $firstArray = \explode("\n", \str_replace("*", "", \trim($string, "/**\n")));
        \var_dump($firstArray);
        return $firstArray;
    }

    /**
     * 
     * @param array $parse
     * @return array
     * @since GI-CMMN.00.01
     */
    private static function formatParse03(array $parse)
    {
        $rtnArray = [];
        for ($index = 0; $index < \count($parse); $index++) {
            switch ($index)
            {
                case 0:
                    $rtnArray["description"] = \trim($parse[0]);
                    break;
                default:
                    $pos = \strpos($parse[$index], " ", 2);
                    $tagname = \substr($parse[$index], 1, $pos - 1);
                    $rtnArray[$tagname] = static::parseTag($tagname, \substr($parse[$index], $pos + 1));
                    break;
            }
        }
        \var_dump($rtnArray);
        return $rtnArray;
    }

    /**
     * 
     * @param string $comment
     * @return array
     * @since GI-CMMN.00.01
     */
    public static function parseFromString($comment)
    {
        return static::formatParse03(static::formatParse02(static::formatParse01($comment)));
    }

}
