<?php

/**
 * GICommon - ArrayAccess 2017-12-24
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package GIndie\Common\PHP
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
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
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
            static::offsetSet($key, $value);
        }
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @param mixed $offset
     * 
     * @return boolean <b>TRUE</b> on success or <b>FALSE</b> on failure.
     * 
     * @since GI.01.00
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
     * 
     * @param mixed $offset The offset to retrieve.
     * @return mixed|null The offsetted data. Null if it's not setted.
     * 
     * @since GI.01.00
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }

    /**
     * Implementation for interface ArrayAccess
     * 
     * @param mixed $offset The offset to assign the value to.
     * @param mixed $value The value to set.
     * 
     * @return void
     * 
     * @since GI.01.00
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
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * 
     * @param mixed $offset The offset to unset.
     * @return void
     * 
     * @since GI.01.00
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

}
