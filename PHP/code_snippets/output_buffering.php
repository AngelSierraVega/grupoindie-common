<?php

/**
 * GI-Common-DVLP - output_buffering
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (C) 2018 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
 *
 * @version 0B.00
 * @since 17-12-26
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
\ob_start();
?>
<p>Hello Wolrd!</p>
<?php

$out = \ob_get_contents();
\ob_end_clean();
