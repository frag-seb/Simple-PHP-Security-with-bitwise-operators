<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 21:13
 */

namespace Security\Service;


/**
 * Interface Factory
 * @package Security\Service
 */
interface Factory
{
    /**
     * @method factory
     *
     * @param $type
     * @return mixed
     */
    public static function factory($type);
}