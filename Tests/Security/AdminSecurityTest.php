<?php
namespace Tests\Security;

use Security\AdminSecurity;

/**
 * Class AdminSecurityTest
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  19:49
 * @description -
 *
 * @package Tests\Security
 */
class AdminSecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AdminSecurity $admin
     */
    private $admin;

    /**
     * @see AdminSecurityTest::setUp()
     *
     */
    protected function setUp()
    {
        $this->admin = new AdminSecurity();
    }

    /**
     * @see AdminSecurityTest::expectedGroups()
     *
     * @return array
     */
    public function expectedGroups()
    {
        return array(
            array(
                array(
                    'WRITE_POST'    => AdminSecurity::WRITE_POST,
                    'READ_POST'     => AdminSecurity::READ_POST,
                    'DELETE_POST'   => AdminSecurity::DELETE_POST,
                    'DELETE_POSTS'  => AdminSecurity::DELETE_POSTS,
                    'READ_POSTS'    => AdminSecurity::READ_POSTS,
                    'WRITE_USER'    => AdminSecurity::WRITE_USER,
                    'READ_USER'     => AdminSecurity::READ_USER,
                    'DELETE_USER'   => AdminSecurity::DELETE_USER,
                    'DELETE_USERS'  => AdminSecurity::DELETE_USERS,
                    'READ_USERS'    => AdminSecurity::READ_USERS
                )
            )
        );
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionWritePost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionWritePost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['WRITE_POST']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionReadPost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_POST']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionDeletePost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionDeletePost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_POST']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionReadPosts()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionReadPosts($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_POSTS']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionWriteUser()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionWriteUser($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['WRITE_USER']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionDeleteUser()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionDeleteUser($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_USER']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionDeleteUsers()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionDeleteUsers($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_USERS']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityHasPermissionReadUsers()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityHasPermissionReadUsers($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_USERS']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityRemoveGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->admin->removeGroup($expected['READ_USERS']));

    }

    /**
     * @see AdminSecurityTest::testAdminSecurityRemoveGroupThenHasNotPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testAdminSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);
        $this->assertFalse($this->admin->hasPermission($expected['READ_USERS']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityAddGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityAddGroup($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);
        $this->assertTrue($this->admin->addGroup($expected['READ_USERS']));
    }

    /**
     * @see AdminSecurityTest::testAdminSecurityAddGroupThenHasPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testAdminSecurityAddGroupThenHasPermission($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);

        $this->admin->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->admin->hasPermission($expected['READ_USERS']));
    }
}