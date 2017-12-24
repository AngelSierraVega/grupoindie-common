<?php

/**
 * GICommon - phar 2017-12-23
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */


/**
 * Crea un archivo phar
 * @version GI-CMMN.00.01
 * - Copia desde FacturaElectronica
 */
$srcRoot = __DIR__ . "/src/GIndie";
$buildRoot = __DIR__ . "/dist";
$phar = new Phar($buildRoot . '/GICommon.phar', 0, 'GICommon.phar');
$Directory = new RecursiveDirectoryIterator($srcRoot, FilesystemIterator::SKIP_DOTS);
$Iterator = new RecursiveIteratorIterator($Directory);
$phar->buildFromIterator($Iterator, $srcRoot);
$phar->setStub($phar->createDefaultStub('autoloader.php'));
echo "Archivo phar (/dist/GICommon.phar) creado con éxito";
