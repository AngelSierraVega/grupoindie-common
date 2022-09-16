<?php

/**
 * GI-Common-DVLP - Iterator
 *
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @copyright (CC) 2020 Angel Sierra Vega. Grupo INDIE.
 * @license file://LICENSE
 *
 * @package GIndie\Common\PHP
 *
 * @version 0B.00
 * @since 17-12-24
 */

namespace GIndie\Common\PHP;

/**
 * Implements Iterator http://php.net/manual/en/class.iterator.php
 * 
 * @abstract
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @edit 17-12-24
 * - Sources from external project SG-DML
 * @edit 18-08-04
 * - Upgraded DocBlock
 */
abstract class Iterator extends ArrayAccess implements \Iterator
{

    /**
     *
     * @var int  
     */
    private $_position = 0;

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     * @param array $data [optional]
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->_position = 0;
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     */
    function rewind()
    {
        $this->_position = 0;
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     */
    function current()
    {
        return $this->_data[$this->_position];
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     */
    function key()
    {
        return $this->_position;
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     */
    function next()
    {
        ++$this->_position;
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since 17-12-24
     */
    function valid()
    {
        return isset($this->_data[$this->_position]);
    }

}
