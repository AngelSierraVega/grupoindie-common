<?php

/**
 * GI-Common-DVLP - WebAvisoPrivacidad
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\INIHandler
 *
 * @version 0B.00
 * @since 18-02-25
 */

namespace GIndie\INIHandler;

/**
 * 
 * @link <http://www.huffingtonpost.com.mx/p/huffpost-mexico-politica-de-privacidad>
 * 
 * @edit 18-02-25
 * - Class extends \GIndie\INIHandler
 * - Created getCambios(), getContacto(), requiredVars(), getIntro()
 * - Created getNombre(), getExcepciones(), getConfExcIntro()
 * - Created getConfidencialidadIntro(), getConfidencialidadNota()
 * - Created getUsoDatosNota(), getInfRecUsuario(), getUsoDeDatos()
 * - Created getInformacionRecopiladaUsuarioFinalIntro(), getAmbito(), getVigor()
 * - Abstract class
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @edit 18-05-04
 * - Upgraded file versions
 * @edit 18-08-04
 * - Upgraded DocBlock and versions
 */
abstract class WebAvisoPrivacidad extends \GIndie\INIHandler
{

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getCambios()
    {
        return "Podemos actualizar en cualquier momento este aviso de privacidad para que "
                . "refleje los cambios en nuestras prácticas y ofertas de servicios. Si modificamos "
                . "este aviso de privacidad, actualizaremos la \"Fecha de entrada en vigor\".";
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getContacto()
    {
        return "Si tiene alguna duda, solicitud o sugerencia sobre este aviso de privacidad o sobre"
                . " el uso que se le da a la información recopilada puede ponerse en"
                . " contacto con nosotros en " . static::getCategoryValue("Identidad", "Contacto") . "."
                . " O puede acudir directamente a nuestras oficinas en " . static::getCategoryValue("Identidad", "Domicilio") . ".";
    }

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function requiredVars()
    {
        return [
            "AvisoPrivacidad" => ["Vigor", "Intro", "Ambito"],
            "Identidad" => ["Contacto", "Nombre", "Domicilio"],
            "InformacionRecopiladaUsuarioFinal" => ["Intro", "1"],
            "UsoDeDatos" => ["1"],
            "Confidencialidad" => ["Intro"],
            "ConfidencialidadExcepciones" => ["Intro", "1"]
        ];
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getNombre()
    {
        return static::getCategoryValue("Identidad", "Nombre");
    }

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function getExcepciones()
    {
        $counter = 1;
        $skip = false;
        $rntArray = [];
        while ($skip == false) {
            $tmp = static::getCategoryValue("ConfidencialidadExcepciones", (string) $counter);
            $counter++;
            switch (true)
            {
                case \is_null($tmp):
                    $skip = true;
                    break;
                default:
                    $rntArray[(string) $counter] = $tmp;
                    break;
            }
        }
        return $rntArray;
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getConfExcIntro()
    {
        return static::getCategoryValue("ConfidencialidadExcepciones", "Intro");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getConfidencialidadIntro()
    {
        return static::getCategoryValue("Confidencialidad", "Intro");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getConfidencialidadNota()
    {
        return static::getCategoryValue("Confidencialidad", "Nota");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getUsoDatosNota()
    {
        return static::getCategoryValue("UsoDeDatos", "Nota");
    }

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function getInfRecUsuario()
    {
        $counter = 1;
        $skip = false;
        $rntArray = [];
        while ($skip == false) {
            $tmp = static::getCategoryValue("InformacionRecopiladaUsuarioFinal", (string) $counter);
            $counter++;
            switch (true)
            {
                case \is_null($tmp):
                    $skip = true;
                    break;
                default:
                    $rntArray[(string) $counter] = $tmp;
                    break;
            }
        }
        return $rntArray;
    }

    /**
     * 
     * @return array
     * @since 18-02-25
     */
    public static function getUsoDeDatos()
    {
        $counter = 1;
        $skip = false;
        $rntArray = [];
        while ($skip == false) {
            $tmp = static::getCategoryValue("UsoDeDatos", (string) $counter);
            $counter++;
            switch (true)
            {
                case \is_null($tmp):
                    $skip = true;
                    break;
                default:
                    $rntArray[(string) $counter] = $tmp;
                    break;
            }
        }
        return $rntArray;
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getInformacionRecopiladaUsuarioFinalIntro()
    {
        return static::getCategoryValue("InformacionRecopiladaUsuarioFinal", "Intro");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getAmbito()
    {
        return static::getCategoryValue("AvisoPrivacidad", "Ambito");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getVigor()
    {
        return static::getCategoryValue("AvisoPrivacidad", "Vigor");
    }

    /**
     * 
     * @return string
     * @since 18-02-25
     */
    public static function getIntro()
    {
        return static::getCategoryValue("AvisoPrivacidad", "Intro");
    }

}
