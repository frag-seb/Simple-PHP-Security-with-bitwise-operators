<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 20:02
 */

namespace Tests\Security;

use Security\ModeratorSecurity;

/**
 * Class ModeratorSecurityTest
 * @package Tests\Security
 */
class ModeratorSecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ModeratorSecurity $moderator
     */
    private $moderator;

    /**
     * @method setUp
     *
     */
    protected function setUp()
    {
        $this->moderator = new ModeratorSecurity();
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
                    'WRITE_POST'    => ModeratorSecurity::WRITE_POST,
                    'READ_POST'     => ModeratorSecurity::READ_POST,
                    'DELETE_POST'   => ModeratorSecurity::DELETE_POST,
                    'DELETE_POSTS'  => ModeratorSecurity::DELETE_POSTS,
                    'READ_POSTS'    => ModeratorSecurity::READ_POSTS,
                    'WRITE_USER'    => ModeratorSecurity::WRITE_USER,
                    'READ_USER'     => ModeratorSecurity::READ_USER,
                    'DELETE_USER'   => ModeratorSecurity::DELETE_USER,
                    'DELETE_USERS'  => ModeratorSecurity::DELETE_USERS,
                    'READ_USERS'    => ModeratorSecurity::READ_USERS
                )
            )
        );
    }

    /**
     * @method testModeratorSecurityHasNotPermissionWritePost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasNotPermissionWritePost($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['WRITE_POST']));
    }

    /**
     * @method testModeratorSecurityHasPermissionReadPost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['READ_POST']));
    }

    /**
     * @method testModeratorSecurityHasPermissionDeletePost
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasPermissionDeletePost($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['DELETE_POST']));
    }

    /**
     * @method testModeratorSecurityHasNotPermissionReadPosts
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasNotPermissionReadPosts($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['READ_POSTS']));
    }

    /**
     * @method testModeratorSecurityHasNotPermissionWriteUser
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasNotPermissionWriteUser($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['WRITE_USER']));
    }

    /**
     * @method testModeratorSecurityHasPermissionDeleteUser
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasPermissionDeleteUser($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['DELETE_USER']));
    }

    /**
     * @method testModeratorSecurityHasNotPermissionDeleteUsers
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasNotPermissionDeleteUsers($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['DELETE_USERS']));
    }

    /**
     * @method testModeratorSecurityHasPermissionReadUsers
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityHasPermissionReadUsers($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['READ_USERS']));
    }

    /**
     * @method testModeratorSecurityRemoveGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->moderator->removeGroup($expected['READ_USERS']));
    }

    /**
     * @method testModeratorSecurityRemoveGroupThenHasNotPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);
        $this->assertFalse($this->moderator->hasPermission($expected['READ_USERS']));
    }

    /**
     * @method testModeratorSecurityAddGroup
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityAddGroup($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);

        $this->assertTrue($this->moderator->addGroup($expected['READ_USERS']));
    }

    /**
     * @method testModeratorSecurityAddGroupThenHasPermission
     * @dataProvider expectedGroups
     * @param $expected
     */
    public function testModeratorSecurityAddGroupThenHasPermission($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);

        $this->moderator->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->moderator->hasPermission($expected['READ_USERS']));
    }
}