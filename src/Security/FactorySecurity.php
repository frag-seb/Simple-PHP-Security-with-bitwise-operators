<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 20:31
 */

namespace Security;

use Security\Service\Factory;

/**
 * Class FactorySecurity
 * @package Security
 */
class FactorySecurity implements Factory
{
    /**
     * @method factory
     *
     * @param $type
     * @return mixed
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