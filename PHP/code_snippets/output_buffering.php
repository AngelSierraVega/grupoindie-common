<?php

/**
 * GICommon - output_buffering 
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 *
 * @version GI-CMMN.00.00 2017-12-26 Created file.
 */
\ob_start();
?>
<p>Hello Wolrd!</p>
<?php

$out = \ob_get_contents();
\ob_end_clean();
