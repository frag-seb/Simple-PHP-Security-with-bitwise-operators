<?php
namespace Security;

use Security\Service\Factory;

/**
 * Class FactorySecurity
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:31
 * @description -
 *
 * @package Security
 */
class FactorySecurity implements Factory
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
    public static function factory($type)
    {
        $className = __NAMESPACE__ . '\\' . ucfirst($type). 'Security';
        if (!class_exists($className)) {
            throw new \Exception('Missing format class.');
        }
        return new $className();
    }
}