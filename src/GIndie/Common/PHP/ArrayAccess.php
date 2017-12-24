<?php

/**
 * GICommon - ArrayAccess 2017-12-24
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GrupoIndie
 * @subpackage Common
 */

namespace GIndie\Common\PHP;

/**
 * Implements ArrayAccess http://php.net/manual/en/class.arrayaccess.php
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI.00.00 2017-02-02
 * @version GI-CMMN.00.00
 * @edit GI-CMMN.00.01
 * - Sources from external project SG-DML
 */
abstract class ArrayAccess implements \ArrayAccess
{

    /**
     * Stores the data array
     * 
     * @since GI.01.00
     * @update GI.02.00 Changed var name in complyance with PSR
     * 
     * 
     * @var array $data 
     */
    protected $data;

    /**
     * 
     * Implementation for interface ArrayAccess
     * 
     * @since       GI.01.00
     * 
     * @param       array $data [optional]
     */
    public function __construct(array $data = [])
    {
        $this->data = [];
        foreach ($data as $key => $value) {
            //var_dump($key);
            static::offsetSet($key, $value);
        }
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * 
     * @since       GI.01.00
     * 
     * @param       string $offset.
     * 
     * @return      bool True if setted, false otherwise.
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @author      Angel Sierra Vega <angel.sierra@grupoindie.com>
     * 

     * 
     * @since       GI.01.00
     * 
     * @param       string $offset.
     * 
     * @return      mixed|null The offsetted data. Null if it's not setted.
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @since       GI.01.00
     * 
     * 
     * @param       type $offset.
     * @param       type $value.
     * 
     * @return      void
     */
    public function offsetSet($offset, $value)
    {
        if (\is_int($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @since       GI.01.00
     * 
     * 
     * @param       string $offset.
     * 
     * @return      void
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

}
