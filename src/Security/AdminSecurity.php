<?php
namespace Security;

use Security\Service\Security;
use Security\Service\AbstractSecurity;

/**
 * Class AdminSecurity
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:49
 * @description -
 *
 * @package Security
 */
class AdminSecurity extends AbstractSecurity implements Security
{
    /**
     * Set authorization for the Group
     *
     * @see AdminSecurity::__construct()
     * @uses nes AdminSecurity()
     */
    public function __construct()
    {
        $this->addGroup(self::WRITE_POST);
        $this->addGroup(self::READ_POST);
        $this->addGroup(self::DELETE_POST);
        $this->addGroup(self::DELETE_POSTS);
        $this->addGroup(self::READ_POSTS);
        $this->addGroup(self::WRITE_USER);
        $this->addGroup(self::READ_USER);
        $this->addGroup(self::DELETE_USER);
        $this->addGroup(self::DELETE_USERS);
        $this->addGroup(self::READ_USERS);
    }
}