<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 19:57
 */

namespace Tests\Security;

use Security\GuestSecurity;

/**
 * Class GuestSecurityTest
 * @package Tests\Security
 */
class GuestSecurityTest  extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuestSecurity $guest
     */
    private $guest;

    /**
     * @method setUp
     *
     */
    protected function setUp()
    {
        $this->guest = new GuestSecurity();
    }

    /**
     * @method expectedGroups
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
     * @method testGuestSecurityHasPermissionReadPost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->guest->hasPermission($expected['READ_POST']));
    }

    /**
     * @method testGuestSecurityHasPermissionReadUser
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityHasPermissionReadUser($expected)
    {
        $this->assertTrue($this->guest->hasPermission($expected['READ_USER']));
    }

    /**
     * @method testGuestSecurityRemoveGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->guest->removeGroup($expected['READ_POST']));
    }

    /**
     * @method testGuestSecurityRemoveGroupThenHasNotPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->guest->removeGroup($expected['READ_POST']);
        $this->assertFalse($this->guest->hasPermission($expected['READ_POST']));
    }

    /**
     * @method testGuestSecurityAddGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityAddGroup($expected)
    {
        $this->assertTrue($this->guest->addGroup($expected['READ_USERS']));
    }

    /**
     * @method testGuestSecurityAddGroupThenHasPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testGuestSecurityAddGroupThenHasPermission($expected)
    {
        $this->guest->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->guest->hasPermission($expected['READ_USERS']));
    }
}