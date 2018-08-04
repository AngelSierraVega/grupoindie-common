<?php


/**
 * GI-Common-DVLP - DocComment
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\Parser
 *
 * @version 0B.00
 * @since 18-08-04
 */

namespace GIndie\Common\Parser;

/**
 * 
 * @edit 17-12-24
 *  - Added main functions
 * - Functional class
 * @edit 18-01-01
 * - Updated visibility of methods for inheritance
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
class DocComment
{

    /**
     *
     * @var type 
     * @since 17-12-24
     * @todo
     */
    private static $validTags = ["param", "return", "since", "edit", "version", "author"];

    /**
     * 
     * @param type $tagname
     * @param type $value
     * @return type
     * @since 17-12-24
     * @edit 17-12-24
     * @edit 18-01-01
     */
    protected function parseTag($tagname, $value)
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
     * @since 17-12-24
     * @edit 17-12-24
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
     * @since 17-12-24
     * @edit 18-01-01
     */
    protected $data;

    /**
     *
     * @var array 
     * @since 17-12-24
     * @edit 18-01-01
     */
    protected $parsed;

    /**
     * 
     * @param string $comment
     * @since 17-12-24
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
     * @since 17-12-24
     * @edit 17-12-24
     */
    private static function prepareString($string)
    {
        return \explode("\n", \str_replace("*", "", \trim($string, "/**\n")));
    }

    /**
     * Creates the final assoc array
     * @return array
     * @since 17-12-24
     * @edit 17-12-24
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
     * @since 17-12-24
     * @edit 17-12-24
     */
    public static function parseFromString($comment)
    {
        $tmp = new static($comment);
        return $tmp->parsed;
    }

}
