<?php

/**
 * GICommon - Iterator 2017-12-24
 * @copyright (C) 2017 Angel Sierra Vega. Grupo INDIE.
 *
 * @package Common
 */

namespace GIndie\Common\PHP;

/**
 * Implements Iterator http://php.net/manual/en/class.iterator.php
 * 
 * @abstract
 * @author Angel Sierra Vega <angel.sierra@grupoindie.com>
 * @version GI.01.00
 * @version GI-CMMN.00.00
 * @edit GI-CMMN.00.01
 * - Sources from external project SG-DML
 * @edit 18-05-19
 * - Upgraded DocBlock
 * @version 0A.35
 * @todo
 * - Upgrade file versions
 */
abstract class Iterator extends ArrayAccess implements \Iterator
{

    private $_position = 0;

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     * @param       array $data [optional]
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->_position = 0;
    }

    /**
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     * 
     */
    function rewind()
    {
        $this->_position = 0;
    }

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     * 
     */
    function current()
    {
        return $this->_data[$this->_position];
    }

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     */
    function key()
    {
        return $this->_position;
    }

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     * 
     */
    function next()
    {
        ++$this->_position;
    }

    /**
     * 
     * Implementation for interface Iterator
     * 
     * @since       GI.01.00
     * 
     */
    function valid()
    {
        return isset($this->_data[$this->_position]);
    }

}
