<?php
namespace Security;

use Security\Service\Security;
use Security\Service\AbstractSecurity;

/**
 * Class ModeratorSecurity
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:49
 * @description -
 *
 * @package Security
 */
class ModeratorSecurity extends AbstractSecurity implements Security
{
    /**
     * Set authorization for the Group
     *
     * @see ModeratorSecurity::__construct()
     * @uses nes ModeratorSecurity()
     */
    public function __construct()
    {
        $this->addGroup(self::READ_POST);
        $this->addGroup(self::DELETE_POST);
        $this->addGroup(self::DELETE_USER);
        $this->addGroup(self::READ_USERS);
    }
}