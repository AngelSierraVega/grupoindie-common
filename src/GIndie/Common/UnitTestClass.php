<?php

/**
 * GICommon - Test 2017-12-24
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie\Common;

/**
 * Represents a Unit-Test for a class
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI.00.00 2017-05-18
 * @version GI-CMMN.00.00 2017-12-24
 * @edit GI-CMMN.00.01
 * - Sources from external project SG-DML
 * @edit GI-CMMN.00.02
 * - Moved class, renamed class, implements GIInterface
 * - Display error when not implementing a method defined in the class.
 * @edit GI-CMMN.00.03
 * - Created method's: validateDocCommentMethod(), handleMethod()
 * - Updated constructor. Using ReflectionClass to validate a class
 */
abstract class UnitTestClass implements \GIndie\Common\UnitTestClass\GIInterface
{

    /**
     * 
     * @param \ReflectionMethod $Method
     * @since GI-CMMN.00.03
     */
    private static function validateDocCommentMethod(\ReflectionMethod $Method)
    {
        echo "<span style=\"font-size: 1.1em; font-weight: bolder;\">" . $Method->name . " </span><br>";
        $comment = \GIndie\Common\Parser\DocComment::parseFromString($Method->getDocComment());
        switch (true)
        {
            case $Method->isConstructor():
                break;
            default:
                if (isset($comment["return"])) {
                    echo "<span style=\"font-size: 0.9em;\">@return " . $comment["return"] . "</span><br>";
                } else {
                    echo "<span style=\"color:red;\">@return tag must be commented</span><br>";
                }
                break;
        }
    }

    /**
     * 
     * @param \ReflectionMethod $Method
     * @since GI-CMMN.00.03
     */
    private function handleMethod(\ReflectionMethod $Method)
    {
        switch ($this->classname())
        {
            case $Method->class:
                static::validateDocCommentMethod($Method);
                break;
        }
    }

    /**
     * @final
     * @since GI.00.01
     * @edit GI-CMMN.00.03
     */
    final private function __construct()
    {
        echo "<div style=\"font-size: 1.4em;\">------------ " .
        \get_called_class() .
        "</div>\n";
        $ignoreFunctions = \get_class_methods(__CLASS__);
        $testFunctions = \get_class_methods(\get_called_class());
        
        $reflector = new \ReflectionClass($this->classname());
        foreach ($reflector->getMethods() as $ReflectionMethod) {//ReflectionMethod::IS_PROTECTED
            $this->handleMethod($ReflectionMethod);
        }
        foreach (\get_class_methods($this->classname()) as $method) {
            switch (false)
            {
                case (\strcmp($method, "__toString") != 0):
                    break;
                case \in_array($method, $testFunctions):
                //echo "<span style=\"color:red; font-weight: bolder;\"'>" . $method . " must be declared in UnitTestClass</span><br>";
            }
        }
//        foreach ($testFunctions as $function) {
//            \in_array($function, $ignoreFunctions) ?: static::{$function}();
//        }
    }

    /**
     * 
     * Execute a string comparing test.
     * @static
     * 
     * @param string $expected The expected output.
     * @param string $result The code that generates the expected output.
     * 
     * @since GI.00.01
     * @version GI.00.01
     */
    public static function execStrCmp($expected, $result)
    {
        echo "<div style = \"font-size: 1.1em;\">" .
        \debug_backtrace()[1]['function'] . "::";
        switch (\strcmp($expected, $result))
        {
            case 0:
                echo "<span style=\"color: green; font-weight: bolder;\">Passed</span></div>";
                break;
            default:
                echo "<span style=\"color:red; font-weight: bolder;\"'>Error:</span></div>";
                echo "<br/><span style=\"font-size: 1.05em;\">Expected:</span><pre>" .
                \htmlentities($expected) . "</pre>" .
                "<span style=\"font-size: 1.05em;\">Resutl:</span><pre>" . \htmlentities($result) .
                "</pre><br />\n <------------------------>";
                break;
        }
    }

    /**
     * 
     * Execute a string comparing test.
     * @static
     * 
     * @param \Exception $exception The exception to be compared.
     * 
     * @since GI.02.00
     * @version GI.02.00
     */
    public static function execExceptionCmp(\Exception $exception = null)
    {
        echo "<div style=\"font-size: 1.1em;\">" .
        \debug_backtrace()[1]['function'] . "::";
        switch (true)
        {
            case \is_null($exception):
                echo "<span style=\"color:red; font-weight: bolder;\"'>Error</span></div>";
                break;
            default:
                echo "<span style=\"color: green; font-weight: bolder;\">Passed (exception thrown) ";
                echo "</span>";
                echo $exception->getMessage();
                echo "</div>";
                break;
        }
    }

    /**
     * Runs the user defined functions. Implementation of a singleton pattern 
     *      for Test class.
     * @static
     * 
     * @since GI.00.01
     */
    public static function run()
    {
        new static();
    }

}
