<?php

namespace tp2;

/**
 * Class HRDepartment
 *
 * @package tp2
 */
class HRDepartment
{
    /**
     * HRDepartment constructor.
     * @param Enterprise $entreprise
     */
    public function __construct(Enterprise $entreprise)
    {
        // TO IMPLEMENT
    }

    /**
     * @param Person $person
     * @throws \tp2\Exception\AlreadyEmployedException When the given person is already an employee
     */
    public function hire(Person $person)
    {
        // TO IMPLEMENT
    }

    /**
     * @param Person $person
     * @throws \tp2\Exception\NoEmployedException When the given person is not an employee
     */
    public function fire(Person $person)
    {
        // TO IMPLEMENT
    }

    /**
     * @param Person $person
     * @return boolean
     */
    public function isEmployee(Person $person)
    {
        // TO IMPLEMENT
    }
}