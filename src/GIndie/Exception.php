<?php

/**
 * GICommon - Exception 2017-12-23
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie;

/**
 * Description of Exception
 * 
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI-CMMN.00.00 2017-12-23
 * @edit GI-CMMN.00.01 2017-12-26
 * - Added constants from GIndie\INIHandler\Exception
 * - Added constructor from GIndie\INIHandler\Exception
 * - Added var $pathToFile
 */
class Exception extends \Exception
{

    /**
     * 
     * @factory
     * @since GI-CMMN.00.01
     * 
     * @param string $pathToFile
     * return \GIndie\Exception
     */
    public static function fileNotFound($pathToFile)
    {
        return new static(static::FILE_NOT_FOUND, $pathToFile);
    }

    /**
     *
     * @since GI-CMMN.00.01
     * @var string|null 
     */
    public $pathToFile;

    /**
     * 
     * @param int $constant
     * @param mixed|null $param1
     * @param mixed|null $param2
     * 
     * @since GI-CMMN.00.01
     */
    public function __construct($constant, $param1 = null, $param2 = null)
    {
        $class = new \ReflectionClass(__CLASS__);
        $constants = \array_flip($class->getConstants());
        switch ($constant)
        {
            case static::FILE_NOT_FOUND:
                $this->pathToFile = $param1;
                $message = $constants[$constant] . ": " . $this->pathToFile;
                break;
            case static::REQUIRED_VAR:
                $message = $constants[$constant] . ":" . $param2 . " ON FILE " . $param1;
                break;
            default:
                $message = "UNDEFINED_EXCEPTION:" . $constant;
                break;
        }
        parent::__construct($message, $constant);
    }

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     */
    const FILE_NOT_FOUND = 0;

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     */
    const REQUIRED_VAR = 1;

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     */
    const FORMAT = 3;

}
