<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 20:49
 */

namespace Security;

use Security\Service\Security;
use Security\Service\AbstractSecurity;

/**
 * Class ModeratorSecurity
 * @package Security
 */
class ModeratorSecurity extends AbstractSecurity implements Security
{
    /**
     * Set authorization for the Group
     * @method __construct
     */
    public function __construct()
    {
        $this->addGroup(self::READ_POST);
        $this->addGroup(self::DELETE_POST);
        $this->addGroup(self::DELETE_USER);
        $this->addGroup(self::READ_USERS);
    }
}