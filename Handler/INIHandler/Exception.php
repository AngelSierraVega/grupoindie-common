<?php

/**
 * GICommon - Exception 
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * 
 */

namespace GIndie\INIHandler;

/**
 * Description of Exception
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI-CMMN.00.00 2017-12-23 Created class
 * @edit GI-CMMN.00.01
 * - Clase prototipo
 * @edit GI-CMMN.00.02
 * - Int constant. Updated __construct()
 * @edit GI-CMMN.00.03 17-12-26
 * - Moved constants and constructor to \GIndie\Exception
 * - Created method: requiredVariable(), handleMessage()
 * - const REQUIRED_VAR moved from GIndie\Exception
 * @edit GI-CMMN.00.04
 * - Updated method: handleMessage()
 */
class Exception extends \GIndie\Exception
{

    /**
     * 
     * @factory
     * @since GI-CMMN.00.03
     * 
     * @param string $pathToFile
     * @return \GIndie\Common\Exception
     */
    public static function requiredVariable($pathToFile, $varname)
    {
        return new static(static::REQUIRED_VAR, $pathToFile, $varname);
    }

    /**
     * REQUIRED_VAR
     * 
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     * - Renamed to FILE_REQUIRES_VAR from REQUIRED_VAR
     * @edit GI-CMMN.00.03
     * - Moved from GIndie\Exception
     */
    const REQUIRED_VAR = 0;

    /**
     * 
     * @since GI-CMMN.00.03
     * 
     * @param int $constant
     * @param string|null $param1
     * @param string|null $param2
     * @return string
     * @edit GI-CMMN.00.04
     * - Removed static from visibility for using $this.
     * 
     */
    protected function handleMessage($constant, $param1 = null, $param2 = null)
    {
        $message = "";
        switch ($constant)
        {
            case static::REQUIRED_VAR:
                $formatMessage = static::$constants[self::class][$constant] . " " . $param2;
                $message = parent::handleMessage(static::FILE_FORMAT, $param1, $formatMessage);
                break;
            default:
                $message = parent::handleMessage($constant, $param1, $param2);
                break;
        }
        return $message;
    }

}
