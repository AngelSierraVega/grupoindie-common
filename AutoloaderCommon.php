<?php

/**
 * GI-Common-DVLP - AutoloaderCommon
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common
 * 
 * @version 0B.00
 * @since 17-12-23
 */

namespace GIndie\Common;

require_once 'Mysqldump.php';

/**
 * Autoloader function
 * 
 * @edit 17-12-23
 * - Added code from FacturaElectronica
 * @edit 18-02-27
 * - Updated filename from autoloader.php
 * - Updated namespace
 * - Handle requiere for INIHandler and ProjectHandler
 * @edit 18-05-13
 * - Deprecated funcionality for ProjectHandler.
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @edit 18-08-04
 * - Upgraded DocBlock
 * @todo
 * - Create Interface (sepparated project) for Mysqldump
 * - Remove functionality for Mysqldump
 */
\spl_autoload_register(function($className) {

    switch (\substr($className, 0, (\strlen(__NAMESPACE__) * 1)))
    {
        case __NAMESPACE__:
            $edited = \substr($className, \strlen(__NAMESPACE__) + \strrpos($className, __NAMESPACE__));
            $edited = \str_replace("\\", \DIRECTORY_SEPARATOR, __DIR__ . $edited) . ".php";
            if (\is_readable($edited)) {
                require_once($edited);
            }
            break;
        default:
            $requestedFile = \explode("\\", $className);
            $requestedFile = \array_pop($requestedFile) . ".php";
            $requestedNamespace = \substr($className, 0, (\strlen($requestedFile)
                    - 3) * -1);
            if (\is_int(\strpos($className, 'GIndie\\INIHandler'))) {
                $edited = \substr($className, \strlen($requestedNamespace) + \strrpos($className, $requestedNamespace));
                $edited = \str_replace("\\", \DIRECTORY_SEPARATOR, __DIR__ . \DIRECTORY_SEPARATOR . "Handler" . $edited) . ".php";
                if (\is_readable($edited)) {
                    require_once($edited);
                } else {
                    $edited = \substr($className, \strlen($requestedNamespace) + \strrpos($className, $requestedNamespace));
                    $edited = \str_replace("\\", \DIRECTORY_SEPARATOR, __DIR__ . \DIRECTORY_SEPARATOR . "Handler" . \DIRECTORY_SEPARATOR . "INIHandler" . \DIRECTORY_SEPARATOR . $edited) . ".php";
                    if (\is_readable($edited)) {
                        require_once($edited);
                    }
                }
            }
    }
});

require_once 'Exception.php';
