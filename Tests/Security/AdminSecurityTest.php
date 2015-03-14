<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 19:49
 */

namespace Tests\Security;

use Security\AdminSecurity;

/**
 * Class AdminSecurityTest
 * @package Tests\Security
 */
class AdminSecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AdminSecurity $admin
     */
    private $admin;

    /**
     * @method setUp
     *
     */
    protected function setUp()
    {
        $this->admin = new AdminSecurity();
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
     * @method testAdminSecurityHasPermissionWritePost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionWritePost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['WRITE_POST']));
    }

    /**
     * @method testAdminSecurityHasPermissionReadPost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_POST']));
    }

    /**
     * @method testAdminSecurityHasPermissionDeletePost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionDeletePost($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_POST']));
    }

    /**
     * @method testAdminSecurityHasPermissionReadPosts
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionReadPosts($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_POSTS']));
    }

    /**
     * @method testAdminSecurityHasPermissionWriteUser
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionWriteUser($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['WRITE_USER']));
    }

    /**
     * @method testAdminSecurityHasPermissionDeleteUser
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionDeleteUser($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_USER']));
    }

    /**
     * @method testAdminSecurityHasPermissionDeleteUsers
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionDeleteUsers($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['DELETE_USERS']));
    }

    /**
     * @method testAdminSecurityHasPermissionReadUsers
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityHasPermissionReadUsers($expected)
    {
        $this->assertTrue($this->admin->hasPermission($expected['READ_USERS']));
    }

    /**
     * @method testAdminSecurityRemoveGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->admin->removeGroup($expected['READ_USERS']));

    }

    /**
     * @method testAdminSecurityRemoveGroupThenHasNotPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);
        $this->assertFalse($this->admin->hasPermission($expected['READ_USERS']));
    }

    /**
     * @method testAdminSecurityAddGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityAddGroup($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);

        $this->assertTrue($this->admin->addGroup($expected['READ_USERS']));
    }

    /**
     * @method testAdminSecurityAddGroupThenHasPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testAdminSecurityAddGroupThenHasPermission($expected)
    {
        $this->admin->removeGroup($expected['READ_USERS']);

        $this->admin->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->admin->hasPermission($expected['READ_USERS']));
    }
}