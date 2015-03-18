<?php
namespace Security;

use Security\Service\Security;
use Security\Service\AbstractSecurity;

/**
 * Class GuestSecurity
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:49
 * @description -
 *
 * @package Security
 */
class GuestSecurity extends AbstractSecurity implements Security
{
    /**
     * Set authorization for the Group
     *
     * @see GuestSecurity::__construct()
     * @uses nes GuestSecurity()
     */
    public function __construct()
    {
        $this->addGroup(self::READ_POST);
        $this->addGroup(self::READ_USER);
    }
}