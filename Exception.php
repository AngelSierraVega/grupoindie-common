<?php

/**
 * GI-Common-DVLP - Exception
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common
 *
 * @version 0B.00
 * @since 17-12-23
 * 
 * @todo Deprecate class ?
 */

namespace GIndie;

/**
 * @edit 17-12-26
 * - Added constants from GIndie\INIHandler\Exception
 * - Added constructor from GIndie\INIHandler\Exception
 * - Added var $pathToFile
 * - Updated constants. Range of 20 int for each "category" 
 * - Created handleMessage() from constructor
 * - protected constructor
 * - Created methods fileFormat()
 * - Updated methods: __construct(), handleMessage()
 * - Created var $constants
 * - Updated constant definition.
 * - Updated method: fileFormat(), __construct(), handleMessage()
 * - Created var formatMessage
 * - Updated method: handleMessage()
 * @edit 18-02-24
 * - Created FILE_CUSTOM, $customMessage, fileCustom()
 * - Updated handleMessage()
 * @edit 18-02-27
 * - Updated namespace
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
class Exception extends \Exception
{

    /**
     * 
     * @factory
     * @param string $customMessage
     * @return \GIndie\Exception
     * 
     * @since 18-02-24
     */
    public static function fileCustom($customMessage)
    {
        return new static(static::FILE_CUSTOM, $customMessage);
    }

    /**
     * 
     * @factory
     * @since 2017-12-26
     * 
     * @param string $pathToFile
     * @param string $formatMessage
     * 
     * @return \GIndie\Exception
     * 
     * @edit 2017-12-26
     * - Added parameter $formatMessage
     */
    public static function fileFormat($pathToFile, $formatMessage)
    {
        return new static(static::FILE_FORMAT, $pathToFile, $formatMessage);
    }

    /**
     * 
     * @factory
     * @since 2017-12-26
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
     * @since 2017-12-26
     * @var string|null 
     * @edit 2017-12-26 
     * - Renamed to $fileFullPath from $pathToFile
     */
    public $fileFullPath;

    /**
     * 
     * @param int $constant
     * @param mixed|null $param1
     * @param mixed|null $param2
     * 
     * @since 2017-12-26
     * @edit 2017-12-26
     * - Use handleMessage()
     * @edit 2017-12-26
     * - Added ReflectionClass code from handleMessage() 
     * @edit 2017-12-26
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
     * @since 2017-12-26
     * @var array An static assoc array where key = classname, value = array
     */
    protected static $constants = [];

    /**
     * 
     * @since 2017-12-26
     * 
     * @param int $constant
     * @return string
     * @edit 2017-12-26
     * - added \trigger_error() on UNDEFINED_EXCEPTION
     * - Moved case static::FILE_REQUIRES_VAR to INIHandler\Exception
     * - Moved ReflectionClass related code to constructor 
     * - Use var $constants
     * @edit 2017-12-26
     * - Use var formatMessage
     * @edit 2017-12-26
     * - Removed static from visibility for using $this.
     * @edit 18-02-24
     * - Created case static::FILE_CUSTOM
     */
    protected function handleMessage($constant, $param1 = null, $param2 = null)
    {
        $message = "";
        switch ($constant)
        {
            case static::FILE_CUSTOM:
                $this->customMessage = $param1;
                $message = static::$constants[static::class][$constant] . ": " . $this->customMessage;
                break;
            case static::FILE_NOT_FOUND:
                $this->fileFullPath = $param1;
                var_dump($param1);
                \trigger_error("File not found {$param1}", \E_USER_ERROR);
                $message = static::$constants[static::class][$constant] . ": " . $this->fileFullPath;
                break;
            case static::FILE_FORMAT:
                $this->fileFullPath = $param1;
                $this->formatMessage = $param2;
                $message = static::$constants[static::class][$constant] . " in file: " . $this->fileFullPath . " msj: " . $this->formatMessage;
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
     * @since 2017-12-26
     * @var string|null 
     */
    public $formatMessage;

    /**
     * 
     * @var string|null 
     * @since 18-02-24 
     */
    public $customMessage;

    /**
     * File related exceptions from 100
     * 
     * @since 2017-12-26
     * 
     * @var int
     * 
     * @edit 2017-12-26
     */
    const FILE = 100;

    /**
     * FILE_NOT_FOUND
     * 
     * @since 2017-12-26
     * 
     * @var int
     * @edit 2017-12-26
     */
    const FILE_NOT_FOUND = 110;

    /**
     * FILE_FORMAT
     * 
     * @since 2017-12-26
     * 
     * @var int
     * 
     * @edit 2017-12-26
     */
    const FILE_FORMAT = 120;

    /**
     * FILE_CUSTOM
     * 
     * @var int
     * @since 18-02-24
     */
    const FILE_CUSTOM = 130;

}
