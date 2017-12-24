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
 * - Clase copiada de proyecto externo DBHandler
 */
class INIHandler
{

    /**
     * 
     * @param string $var
     * @since GI-CMMN.00.01
     */
    public static function ini_get($var)
    {
        \is_array(static::$ini_data) ?: static::readINI();
        return static::$ini_data[$var];
    }

    /**
     * 
     * @throws \Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     */
    private static function readINI()
    {
        $pathToFile = \dirname(\Phar::running(false)) . "/" . static::$ini_filename . ".ini";
        if (!\file_exists($pathToFile)) {
            throw new \Exception("No existe archivo: " . $pathToFile);
        }
        return static::validateVars(\parse_ini_file($pathToFile));
    }

    /**
     * 
     * @throws \Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     */
    private static function storeINI(array $data)
    {
        if (\session_status() === \PHP_SESSION_ACTIVE) {
            $_SESSION["ini_data"][static::$ini_filename] = $data;
            static::$ini_data = &$_SESSION["ini_data"][static::$ini_filename];
        } else {
            static::$ini_data = $data;
        }
        return static::$ini_data;
    }

    /**
     * 
     * @throws \Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     */
    private static function validateVars(array $data)
    {
        foreach (static::$ini_required_vars as $varname) {
            if (!\array_key_exists($varname, $data)) {
                throw new \Exception("Error en archivo INI \"" . static::$ini_filename . "\". Variable no definida '" . $varname . "'");
            }
        }
        return static::storeINI($data);
    }

    /**
     *
     * @var array 
     * @since GI-CMMN.00.01
     */
    private static $ini_data;

    /**
     *
     * @var string 
     * @since GI-CMMN.00.01
     */
    private static $ini_filename = "DBHandler";

    /**
     *
     * @var array 
     * @since GI-CMMN.00.01
     */
    private static $ini_required_vars = ["server_prefix", "host", "main_username", "main_password"];

}
