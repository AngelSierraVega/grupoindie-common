<?php

/**
 * GICommon - output_buffering 
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
 *
 * @version GI-CMMN.00.00 2017-12-26 Created file.
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
 */
\ob_start();
?>
<p>Hello Wolrd!</p>
<?php

$out = \ob_get_contents();
\ob_end_clean();
