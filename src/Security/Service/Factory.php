<?php
namespace Security\Service;

/**
 * Class Interface Factory
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:31
 * @description -
 *
 * @package Security\Service
 */
interface Factory
{
    /**
     * Creates an instance and returns
     *
     * @see FactorySecurity::factory()
     * @uses FactorySecurity::factory($type)
     *
     * @param $type
     * @return mixed
     *
     * @throws \Exception
     */
    public static function factory($type);
}