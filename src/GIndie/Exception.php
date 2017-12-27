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
 * @edit GI-CMMN.00.02
 * - Updated constants. Range of 20 int for each "category" 
 * - Created handleMessage() from constructor
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
     * @edit GI-CMMN.00.02 
     * - Renamed to $fileFullPath from $pathToFile
     */
    public $fileFullPath;

    /**
     * 
     * @param int $constant
     * @param mixed|null $param1
     * @param mixed|null $param2
     * 
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     * - Use handleMessage()
     */
    public function __construct($constant, $param1 = null, $param2 = null)
    {
        if(!\is_int($constant)){
            \trigger_error("Parameter should be constant", \E_USER_ERROR);
        }
        \var_dump($constant);
        parent::__construct(static::handleMessage($constant,$param1,$param2), $constant);
    }

    /**
     * 
     * @since GI-CMMN.00.02
     * 
     * @param int $constant
     * @return string
     * 
     */
    protected static function handleMessage($constant, $param1 = null, $param2 = null)
    {
        $class = new \ReflectionClass(\get_called_class());
        $constants = \array_flip($class->getConstants());
        $message = "";
        switch ($constant)
        {
            case static::FILE_NOT_FOUND:
                $this->fileFullPath = $param1;
                $message = $constants[$constant] . ": " . $this->fileFullPath;
                break;
            case static::FILE_REQUIRES_VAR:
                $message = $constants[$constant] . ":" . $param2 . " ON FILE " . $param1;
                break;
            case static::FORMAT:
                $message = $constants[$constant] . ": " . $param1;
                break;
            default:
                $message = "UNDEFINED_EXCEPTION:" . $constant;
                break;
        }
        \var_dump($message);
        \var_dump($constant);
        return $message;
    }
    
    /**
     * File related exceptions from 20 to 39
     * @var int
     * @since GI-CMMN.00.02
     */
    const FILE = 20;

    /**
     * FILE_NOT_FOUND
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    const FILE_NOT_FOUND = 21;

    /**
     * FILE_REQUIRES_VAR
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     * - Renamed to FILE_REQUIRES_VAR from REQUIRED_VAR
     */
    const FILE_REQUIRES_VAR = 22;

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    const FORMAT = 40;

}
