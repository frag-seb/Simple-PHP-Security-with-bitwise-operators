<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 19:49
 */

namespace Tests\Security;

use Security\FactorySecurity;

/**
 * Class FactorySecurityTest
 * @package Tests\Security
 */
class FactorySecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @method testFactorySecurityAdminFactory
     *
     * @throws \Exception
     */
    public function testFactorySecurityAdminFactory()
    {
        $this->assertInstanceOf('Security\AdminSecurity', FactorySecurity::factory('Admin'));
    }

    /**
     * @method testFactorySecurityAdminFactorySecurity
     *
     * @throws \Exception
     */
    public function testFactorySecurityAdminFactorySecurity()
    {
        $this->assertInstanceOf('Security\Service\Security', FactorySecurity::factory('Admin'));
    }

    /**
     * @method testFactorySecurityModeratorFactory
     *
     * @throws \Exception
     */
    public function testFactorySecurityModeratorFactory()
    {
        $this->assertInstanceOf('Security\ModeratorSecurity', FactorySecurity::factory('Moderator'));
    }

    /**
     * @method testFactorySecurityModeratorFactorySecurity
     *
     * @throws \Exception
     */
    public function testFactorySecurityModeratorFactorySecurity()
    {
        $this->assertInstanceOf('Security\Service\Security', FactorySecurity::factory('Moderator'));
    }
}