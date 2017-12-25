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
 * @edit GI-CMMN.00.02
 * - Functional class
 */
class DocComment
{

    /**
     *
     * @var type 
     * @since GI-CMMN.00.01
     * @todo
     */
    private static $validTags = ["param", "return", "since", "edit", "version", "author"];

    /**
     * 
     * @param type $tagname
     * @param type $value
     * @return type
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    private function parseTag($tagname, $value)
    {
        switch ($tagname)
        {
            case "param":
            case "edit":
            case "example":
                $this->parsed[$tagname][] = $value;
                break;
            default:
                $this->parsed[$tagname] = $value;
                break;
        }
    }

    /**
     * Handles triming and concatenation.
     * 
     * @param array $parse
     * @return array
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    private static function data(array $parse)
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
        //\var_dump($newArray);
        return $newArray;
    }

    /**
     *
     * @var array 
     * @since GI-CMMN.00.02
     */
    private $data;
    
    /**
     *
     * @var array 
     * @since GI-CMMN.00.02
     */
    private $parsed;

    /**
     * 
     * @param string $comment
     * @since GI-CMMN.00.02
     */
    protected function __construct($comment)
    {
        $this->data = static::data(static::prepareString($comment));
        $this->parse();
    }

    /**
     * Removes main characters from DocComment. Explodes the string by line break
     * 
     * @param string $string
     * @return array
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    private static function prepareString($string)
    {
        return \explode("\n", \str_replace("*", "", \trim($string, "/**\n")));
    }

    /**
     * Creates the final assoc array
     * @return array
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    private function parse()
    {
        $this->parsed = [];
        for ($index = 0; $index < \count($this->data); $index++) {
            switch ($index)
            {
                case 0:
                    $this->parsed["description"] = \trim($this->data[0]);
                    break;
                default:
                    $pos = \strpos($this->data[$index], " ", 2);
                    $tagname = \substr($this->data[$index], 1, $pos - 1);
                    $this->parseTag($tagname, \substr($this->data[$index], $pos + 1));
                    break;
                    //$rtnArray[$tagname] = static::parseTag($tagname, \substr($parse[$index], $pos + 1));
                    break;
            }
        }
        //\var_dump($this->parsed);
        //return $rtnArray;
    }

    /**
     * 
     * @param string $comment
     * @return array
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    public static function parseFromString($comment)
    {
        $tmp = new static($comment);
        return $tmp->parsed;
    }

}
