<?php

namespace tests\tp1;

use tp1\ParameterBag;

/**
 * Class ParameterBagTest
 *
 * @package tests\tp1
 */
class ParameterBagTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ParameterBag
     */
    protected $bag;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->bag = new ParameterBag(array('foo' => 'bar', 'baz' => '123'));
    }

    /**
     *
     */
    public function testCount()
    {

    }

    /**
     *
     */
    public function testGet()
    {
        static::assertEquals('bar', $this->bag->get('foo'));
        static::assertEquals(null, $this->bag->get('pony'));
        static::assertEquals('pink', $this->bag->get('pony', 'pink'));
    }

    /**
     *
     */
    public function testGetInt()
    {

    }

    /**
     *
     */
    public function testSet()
    {

    }

    /**
     *
     */
    public function testHas()
    {

    }

    /**
     *
     */
    public function testRemove()
    {

    }

    /**
     *
     */
    public function testAll()
    {

    }

    /**
     *
     */
    public function testKeys()
    {

    }

    /**
     *
     */
    public function testAdd()
    {

    }
}
