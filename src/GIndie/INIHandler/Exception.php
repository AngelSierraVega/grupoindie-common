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
 * @edit GI-CMMN.00.02
 * - Int constant. Updated __construct()
 */
class Exception extends \GIndie\Exception
{

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    const FILE_NOT_FOUND = 0;

    /**
     * 
     * @var int
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    const REQUIRED_VAR = 1;

    /**
     * 
     * @param string $constant
     * @param mixed|null $param1
     * @param mixed|null $param2
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     */
    public function __construct($constant, $param1 = null, $param2 = null)
    {
        $class = new ReflectionClass(__CLASS__);
        $constants = array_flip($class->getConstants());
        switch ($constant)
        {
            case static::FILE_NOT_FOUND:
                $message = $constants[$constant] . ":" . $param1;
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

}
