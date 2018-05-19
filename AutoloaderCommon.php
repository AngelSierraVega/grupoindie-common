<?php

/**
 * GI-Common-DVLP - AutoloaderCommon
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 *
 * @since 17-12-23
 * @edit 17-12-23
 * - Added code from FacturaElectronica
 * @version 0A.00
 * @edit 18-02-27
 * - Updated filename from autoloader.php
 * - Updated namespace
 * - Handle requiere for INIHandler and ProjectHandler
 * @version 0A.10
 * @edit 18-05-13
 * - Deprecated funcionality for ProjectHandler.
 * @version 0A.20
 * @edit 18-05-19
 * - Upgraded DocBlock and file version
 * @version 0A.50
 * @todo
 * - Create Interface (sepparated project) for Mysqldump
 * - Remove functionality for Mysqldump
 */

namespace GIndie\Common;

require_once 'Mysqldump.php';

/**
 * Autoloader function
 * @since 17-12-23
 * @edit 18-02-27
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
//        case \Ifsnop\Mysqldump\Mysqldump::class:
//            require_once 'Mysqldump.php';
//            break;
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
        /**
         * @deprecated since 18-05-13
         * - Moved classes into sepparated projects
         */
//            if (\is_int(\strpos($className, 'GIndie\\ProjectHandler'))) {
//                $edited = \substr($className, \strlen($requestedNamespace) + \strrpos($className, $requestedNamespace));
//                $edited = \str_replace("\\", \DIRECTORY_SEPARATOR, __DIR__ . \DIRECTORY_SEPARATOR . "Handler" . $edited) . ".php";
//                if (\is_readable($edited)) {
//                    require_once($edited);
//                } else {
//                    $edited = \substr($className, \strlen($requestedNamespace) + \strrpos($className, $requestedNamespace));
//                    $edited = \str_replace("\\", \DIRECTORY_SEPARATOR, __DIR__ . \DIRECTORY_SEPARATOR . "Handler" . \DIRECTORY_SEPARATOR . "ProjectHandler" . \DIRECTORY_SEPARATOR . $edited) . ".php";
//                    if (\is_readable($edited)) {
//                        require_once($edited);
//                    }
//                }
//            }
    }
});

require_once 'Exception.php';
