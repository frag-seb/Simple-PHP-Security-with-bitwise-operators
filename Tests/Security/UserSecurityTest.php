<?php
namespace Tests\Security;

use Security\UserSecurity;

/**
 * Class GuestSecurityTest
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  13.03.2015
 * @time        -  14:16
 * @description -
 *
 * @package Tests\Security
 */
class UserSecurityTest  extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuestSecurity $user
     */
    private $user;

    /**
     * @see UserSecurityTest::setUp()
     *
     */
    protected function setUp()
    {
        $this->user = new UserSecurity();
    }

    /**
     * @see UserSecurityTest::expectedGroups()
     *
     * @return array
     */
    public function expectedGroups()
    {
        return array(
            array(
                array(
                    'WRITE_POST'    => UserSecurity::WRITE_POST,
                    'READ_POST'     => UserSecurity::READ_POST,
                    'DELETE_POST'   => UserSecurity::DELETE_POST,
                    'DELETE_POSTS'  => UserSecurity::DELETE_POSTS,
                    'READ_POSTS'    => UserSecurity::READ_POSTS,
                    'WRITE_USER'    => UserSecurity::WRITE_USER,
                    'READ_USER'     => UserSecurity::READ_USER,
                    'DELETE_USER'   => UserSecurity::DELETE_USER,
                    'DELETE_USERS'  => UserSecurity::DELETE_USERS,
                    'READ_USERS'    => UserSecurity::READ_USERS
                )
            )
        );
    }

    /**
     * @see UserSecurityTest::testUserSecurityHasNotPermissionReadUser()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testUserSecurityHasNotPermissionReadUser($expected)
    {
        $this->assertFalse($this->user->hasPermission($expected['READ_USER']));
    }

    /**
     * @see UserSecurityTest::testUserSecurityAddGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testUserSecurityAddGroup($expected)
    {
        $this->assertTrue($this->user->addGroup($expected['READ_USERS']));
    }

    /**
     * @see UserSecurityTest::testUserSecurityAddGroupThenHasPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testUserSecurityAddGroupThenHasPermission($expected)
    {
        $this->user->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->user->hasPermission($expected['READ_USERS']));
    }
}