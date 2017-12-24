<?php

/**
 * GICommon - INIHandler 2017-12-23
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie;

/**
 * Description of INIHandler
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI-CMMN.00.00
 * @edit GI-CMMN.00.01
 * - Copied class from external project DBHandler
 * @edit GI-CMMN.00.02
 * - getValue(): Method ini_get renamed to getValue due to PSR-1 violation.
 * - Deleted private static vars: $ini_filename, $ini_required_vars
 * - Implemented \GIndie\INIHandler\InterfaceINIHandler in class
 * @edit GI-CMMN.00.03
 * - Abstract class
 * - Implemented custom \GIndie\INIHandler\Exception in method: readINI(), validateVars()
 * @edit GI-CMMN.00.04
 * - Replaced static::$ini_data with self::$ini_data 
 */
abstract class INIHandler implements \GIndie\INIHandler\InterfaceINIHandler
{

    /**
     * Gets the value from the specified variable
     * @param string $varname The name of the variable
     * @since GI-CMMN.00.01
     * @edit GI-CMMN.00.02
     * @return mixed
     */
    public static function getValue($varname)
    {
        isset(self::$ini_data[static::fileName()]) ?: static::readINI();
        return self::$ini_data[static::fileName()][$varname];
    }

    /**
     * 
     * @throws \GIndie\INIHandler\Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.02
     * @edit GI-CMMN.00.03
     */
    private static function readINI()
    {
        $pathToFile = \dirname(\Phar::running(false)) . "/" . static::fileName() . ".ini";
        if (!\file_exists($pathToFile)) {
            throw new \GIndie\INIHandler\Exception(\GIndie\INIHandler\Exception::FILE_NOT_FOUND, $pathToFile);
        }
        return static::validateVars(\parse_ini_file($pathToFile));
    }

    /**
     * 
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.02
     */
    private static function storeINI(array $data)
    {
        if (\session_status() === \PHP_SESSION_ACTIVE) {
            $_SESSION["ini_data"][static::fileName()] = $data;
            self::$ini_data[static::fileName()] = &$_SESSION["ini_data"][static::fileName()];
        } else {
            self::$ini_data[static::fileName()] = $data;
        }
        return self::$ini_data[static::fileName()];
    }

    /**
     * 
     * @throws \Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.03
     */
    private static function validateVars(array $data)
    {
        foreach (static::requiredVars() as $varname) {
            if (!\array_key_exists($varname, $data)) {
                throw new \GIndie\INIHandler\Exception(\GIndie\INIHandler\Exception::REQUIRED_VAR, static::fileName(),$varname);
            }
        }
        return static::storeINI($data);
    }

    /**
     *
     * @var array 
     * @since GI-CMMN.00.01
     */
    private static $ini_data = [];

}
