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
 * Class GuestSecurity
 * @package Security
 */
class GuestSecurity extends AbstractSecurity implements Security
{
    /**
     * Set authorization for the Group
     * @method __construct
     */
    public function __construct()
    {
        $this->addGroup(self::READ_POST);
        $this->addGroup(self::READ_USER);
    }
}