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
 * @edit GI-CMMN.00.05
 * - Method readINI(): static::pathToFile() used
 * @edit GI-CMMN.00.06 2017-12-26
 * - Created method: validateDataArray()
 * - Updated method: readINI(), storeINI(), validateVars(), getCategoryValue()
 * @edit GI-CMMN.00.07 18-01-05
 * - Use trait AliasMethods
 * @edit GI-CMMN.00.08 18-01-07
 * - 
 */
abstract class INIHandler implements \GIndie\INIHandler\InterfaceINIHandler
{

    /**
     * @since GI-CMMN.00.07
     */
    use \GIndie\INIHandler\AliasMethods;

    /**
     * Gets the value from the specified variable
     * 
     * @since GI-CMMN.00.01
     * 
     * @param string $category The category of the variable.
     * @param string $varname The name of the variable
     * 
     * @return mixed
     * @edit GI-CMMN.00.02
     * - Renamed to getCategoryValue from getValue
     * - Added parameter $category
     * @edit GI-CMMN.00.08
     * - Returns null if var is not setted.
     */
    public static function getCategoryValue($category, $varname)
    {
        isset(self::$ini_data[static::fileName()]) ?: static::readINI();
        return isset(self::$ini_data[static::fileName()][$category][$varname]) ? self::$ini_data[static::fileName()][$category][$varname] : null;
    }

    /**
     * 
     * @return string
     * @since WST-SRVDR.00.08
     */
    final public static function pathToFile()
    {
        if (empty(\Phar::running(false))) {
            $tmpDir = \pathinfo($_SERVER["SCRIPT_FILENAME"], \PATHINFO_DIRNAME) . "\\private\\" . static::fileName() . ".ini";
            //\var_dump($tmpDir);
            return $tmpDir;
        } else {
            return \dirname(\Phar::running(false)) . "/" . static::fileName() . ".ini";
        }
    }

    /**
     * 
     * @throws \GIndie\INIHandler\Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.06
     * - parse_ini_file now reads the categories from the file
     */
    private static function readINI()
    {
        if (!\file_exists(static::pathToFile())) {
            //\var_dump(static::pathToFile());
            throw new \GIndie\INIHandler\Exception(\GIndie\INIHandler\Exception::FILE_NOT_FOUND, static::pathToFile());
        }
        return static::validateDataArray(\parse_ini_file(static::pathToFile(), true));
    }

    /**
     * 
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.06
     * - Commented session-save related code
     * @todo 
     * - Handle session store.
     */
    private static function storeINI(array $data)
    {
//        if (\session_status() === \PHP_SESSION_ACTIVE) {
//            $_SESSION["ini_data"][static::fileName()] = $data;
//            self::$ini_data[static::fileName()] = &$_SESSION["ini_data"][static::fileName()];
//        } else {
//            self::$ini_data[static::fileName()] = $data;
//        }
        self::$ini_data[static::fileName()] = $data;
        return self::$ini_data[static::fileName()];
    }

    /**
     * @todo
     * 
     * @param array $data
     * @return type
     * @since GI-CMMN.00.06
     */
    private static function validateDataArray(array $data)
    {
        //\array_keys($data);

        return static::validateVars($data);
    }

    /**
     * 
     * @throws \Exception
     * @since GI-CMMN.00.01
     * 
     * @return array The settings are returned as an associative array on success,
     * and <b>FALSE</b> on failure.
     * @edit GI-CMMN.00.06
     * - Validate sections functional
     * @todo 
     * - validate variables
     */
    private static function validateVars(array $data)
    {
        //Validate sections
        foreach (\array_keys(static::requiredVars()) as $section) {
            if (\is_int($section)) {
                throw \GIndie\INIHandler\Exception::fileFormat(static::class . ".php", "requiredVars() should be an assoc array");
            }
            //\var_dump($section);
            $vars = static::requiredVars();
            $vars = $vars[$section];
            if(\is_array($vars)){
                
            }else{
                $vars = [$vars];
            }
            //\var_dump($vars);
            if (\array_key_exists($section, $data)) {
                foreach ($vars as $requiredVar) {
                    //\var_dump($requiredVar);
                    //\var_dump($data[$section]);
                    if (\array_key_exists($requiredVar, $data[$section])) {
                        /**
                         * @todo validate variables
                         */
                    } else {
                        throw \GIndie\INIHandler\Exception::requiredVariable(static::pathToFile(), $section . "-" . $requiredVar);
                    }
                }
//                if (\in_array($vars, $data))
//                    ;
//                foreach (\array_values($data[$section]) as $value) {
////                    switch (true)
////                    {
////                        case \is_string($value):
////                            throw new INIHandler\Exception(INIHandler\Exception::requiredVariable(static::pathToFile(), $varname));
////                            break;
////                        default:
////                            break;
////                    }
//                    if (!\array_key_exists($varname, $data)) {
//                        throw new \GIndie\INIHandler\Exception(\GIndie\INIHandler\Exception::REQUIRED_VAR, static::fileName(), $varname);
//                    }
//                }
//                \var_dump($data);
//                if (\array_key_exists($var, $data[$section])) {
//                    
//                } else {
//                    
//                }
            } else {
                throw \GIndie\INIHandler\Exception::requiredVariable(static::pathToFile(), $section);
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
