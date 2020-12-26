<?php

/**
 * GI-Common-DVLP - Fecha
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package  GIndie\Common\Parser
 *
 * @version 0A.00
 * @since 18-11-17
 */

namespace GIndie\Common\Parser;

/**
 * Description of Fecha
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 */
class Fecha
{

    /**
     * 
     * @param mixed $value
     * @return string
     * @since 18-11-17
     */
    public static function MesMayMin($value)
    {
        $value = (int) $value;
        switch ($value)
        {
            case 1:
                $value = "ENE";
                break;
            case 2:
                $value = "FEB";
                break;
            case 3:
                $value = "MAR";
                break;
            case 4:
                $value = "ABR";
                break;
            case 5:
                $value = "MAY";
                break;
            case 6:
                $value = "JUN";
                break;
            case 7:
                $value = "JUL";
                break;
            case 8:
                $value = "AGO";
                break;
            case 9:
                $value = "SEP";
                break;
            case 10:
                $value = "OCT";
                break;
            case 11:
                $value = "NOV";
                break;
            case 12:
                $value = "DIC";
                break;
            default:
                break;
        }
        return $value;
    }

}
