<?php

/**
 * GICommon - Exception 2017-12-23
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
 * @version GI-CMMN.00.00
 * @edit GI-CMMN.00.01
 * - Clase prototipo
 */
class Exception extends \GIndie\Exception
{

    /**
     * 
     * @var string
     * @since GI-CMMN.00.01
     */
    const FILE_NOT_FOUND = "FILE_NOT_FOUND";

    /**
     * 
     * @var string
     * @since GI-CMMN.00.01
     */
    const REQUIRED_VAR = "REQUIRED_VAR";

    /**
     * 
     * @param string $constant
     * @param mixed|null $param1
     * @param mixed|null $param2
     * @since GI-CMMN.00.01
     */
    public function __construct($constant, $param1 = null, $param2 = null)
    {
        switch ($constant)
        {
            case static::FILE_NOT_FOUND:
                $message = $constant . ": " . $param1;
                break;
            case static::REQUIRED_VAR:
                $message = $constant . $param2 . " ON FILE " . $param1;
                break;
            default:
                $message = "UNDEFINED_EXCEPTION:" . $constant;
                break;
        }
        parent::__construct($message, $constant);
    }

}
