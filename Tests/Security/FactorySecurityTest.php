<?php
namespace Tests\Security;

use Security\FactorySecurity;

/**
 * Class FactorySecurityTest
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  19:49
 * @description -
 *
 * @package Tests\Security
 */
class FactorySecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @see FactorySecurityTest::testFactorySecurityAdminFactory()
     *
     * @throws \Exception
     *
     * @Assert assertInstanceOf
     */
    public function testFactorySecurityAdminFactory()
    {
        $this->assertInstanceOf('Security\AdminSecurity', FactorySecurity::factory('Admin'));
    }

    /**
     * @see FactorySecurityTest::testFactorySecurityAdminFactorySecurity()
     *
     * @throws \Exception
     *
     * @Assert assertInstanceOf
     */
    public function testFactorySecurityAdminFactorySecurity()
    {
        $this->assertInstanceOf('Security\Service\Security', FactorySecurity::factory('Admin'));
    }

    /**
     * @see FactorySecurityTest::testFactorySecurityModeratorFactory()
     *
     * @throws \Exception
     *
     * @Assert assertInstanceOf
     */
    public function testFactorySecurityModeratorFactory()
    {
        $this->assertInstanceOf('Security\ModeratorSecurity', FactorySecurity::factory('Moderator'));
    }

    /**
     * @see FactorySecurityTest::testFactorySecurityModeratorFactorySecurity()
     *
     * @throws \Exception
     *
     * @Assert assertInstanceOf
     */
    public function testFactorySecurityModeratorFactorySecurity()
    {
        $this->assertInstanceOf('Security\Service\Security', FactorySecurity::factory('Moderator'));
    }
}