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
 * @edit GI-CMMN.00.03
 * - protected constructor
 * - Created methods fileFormat()
 * - Updated methods: __construct(), handleMessage()
 * - Created var $constants
 * - Updated constant definition.
 * @edit GI-CMMN.00.04 17-12-26
 * - Updated method: fileFormat(), __construct(), handleMessage()
 * - Created var formatMessage
 */
class Exception extends \Exception
{

    /**
     * 
     * @factory
     * @since GI-CMMN.00.03
     * 
     * @param string $pathToFile
     * @param string $formatMessage
     * 
     * @return \GIndie\Exception
     * 
     * @edit GI-CMMN.00.04
     * - Added parameter $formatMessage
     */
    public static function fileFormat($pathToFile, $formatMessage)
    {
        return new static(static::FILE_FORMAT, $pathToFile, $formatMessage);
    }

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
     * @edit GI-CMMN.00.03
     * - Added ReflectionClass code from handleMessage() 
     * @edit GI-CMMN.00.04
     * - Public visibility due to error
     */
    public function __construct($constant, $param1 = null, $param2 = null)
    {
        if (!\is_int($constant)) {
            \trigger_error("Parameter should be constant", \E_USER_ERROR);
        }
        if (!isset(static::$constants[static::class])) {
            $class = new \ReflectionClass(static::class);
            static::$constants[static::class] = \array_flip($class->getConstants());
        }
        parent::__construct(static::handleMessage($constant, $param1, $param2), $constant);
    }

    /**
     * @since GI-CMMN.00.03
     * @var array An static assoc array where key = classname, value = array
     */
    protected static $constants = [];

    /**
     * 
     * @since GI-CMMN.00.02
     * 
     * @param int $constant
     * @return string
     * @edit GI-CMMN.00.03
     * - added \trigger_error() on UNDEFINED_EXCEPTION
     * - Moved case static::FILE_REQUIRES_VAR to INIHandler\Exception
     * - Moved ReflectionClass related code to constructor 
     * - Use var $constants
     * @edit GI-CMMN.00.04
     * - Use var formatMessage
     */
    protected static function handleMessage($constant, $param1 = null, $param2 = null)
    {
        $message = "";
        switch ($constant)
        {
            case static::FILE_NOT_FOUND:
                $this->fileFullPath = $param1;
                $message = static::$constants[static::class][$constant] . ": " . $this->fileFullPath;
                break;
            case static::FILE_FORMAT:
                $this->fileFullPath = $param1;
                $this->formatMessage = $param2;
                $message = static::$constants[static::class][$constant] . " in file " . $this->fileFullPath . " " . $this->formatMessage;
                break;
            default:
                \trigger_error("UNDEFINED_EXCEPTION: " . $constant, \E_USER_ERROR);
                $message = "UNDEFINED_EXCEPTION:" . $constant;
                break;
        }
        return $message;
    }

    /**
     * $formatMessage
     * 
     * @since GI-CMMN.00.04
     * @var string|null 
     */
    public $formatMessage;

    /**
     * File related exceptions from 100
     * 
     * @since GI-CMMN.00.02
     * 
     * @var int
     * 
     * @edit GI-CMMN.00.03
     */
    const FILE = 100;

    /**
     * FILE_NOT_FOUND
     * 
     * @since GI-CMMN.00.01
     * 
     * @var int
     * @edit GI-CMMN.00.03
     */
    const FILE_NOT_FOUND = 110;

    /**
     * FILE_FORMAT
     * 
     * @since GI-CMMN.00.01
     * 
     * @var int
     * 
     * @edit GI-CMMN.00.03
     */
    const FILE_FORMAT = 120;

}
