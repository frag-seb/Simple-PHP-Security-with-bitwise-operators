<?php
namespace Tests\Security;

use Security\GuestSecurity;

/**
 * Class GuestSecurityTest
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  19:57
 * @description -
 *
 * @package Tests\Security
 */
class GuestSecurityTest  extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuestSecurity $guest
     */
    private $guest;

    /**
     * @see GuestSecurityTest::setUp()
     *
     */
    protected function setUp()
    {
        $this->guest = new GuestSecurity();
    }

    /**
     * @see GuestSecurityTest::expectedGroups()
     *
     * @return array
     */
    public function expectedGroups()
    {
        return array(
            array(
                array(
                    'WRITE_POST'    => GuestSecurity::WRITE_POST,
                    'READ_POST'     => GuestSecurity::READ_POST,
                    'DELETE_POST'   => GuestSecurity::DELETE_POST,
                    'DELETE_POSTS'  => GuestSecurity::DELETE_POSTS,
                    'READ_POSTS'    => GuestSecurity::READ_POSTS,
                    'WRITE_USER'    => GuestSecurity::WRITE_USER,
                    'READ_USER'     => GuestSecurity::READ_USER,
                    'DELETE_USER'   => GuestSecurity::DELETE_USER,
                    'DELETE_USERS'  => GuestSecurity::DELETE_USERS,
                    'READ_USERS'    => GuestSecurity::READ_USERS
                )
            )
        );
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityHasPermissionReadPost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testGuestSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->guest->hasPermission($expected['READ_POST']));
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityHasPermissionReadUser()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testGuestSecurityHasPermissionReadUser($expected)
    {
        $this->assertTrue($this->guest->hasPermission($expected['READ_USER']));
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityRemoveGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testGuestSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->guest->removeGroup($expected['READ_POST']));
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityRemoveGroupThenHasNotPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testGuestSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->guest->removeGroup($expected['READ_POST']);
        $this->assertFalse($this->guest->hasPermission($expected['READ_POST']));
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityAddGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testGuestSecurityAddGroup($expected)
    {
        $this->assertTrue($this->guest->addGroup($expected['READ_USERS']));
    }

    /**
     * @see GuestSecurityTest::testGuestSecurityAddGroupThenHasPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testGuestSecurityAddGroupThenHasPermission($expected)
    {
        $this->guest->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->guest->hasPermission($expected['READ_USERS']));
    }
}