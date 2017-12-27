<?php

/**
 * GICommon - 01_setup 2017-12-26
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00
 */
require_once \realpath('../../../src/GIndie/autoloader.php');
require_once 'MyINIHandler.php';
\var_dump(\MyINIHandler::getCategoryValue("MyINI", "test1"));
\var_dump(\MyINIHandler::getCategoryValue("section1", "test1"));
\var_dump(\MyINIHandler::getCategoryValue("section2", "test1"));
